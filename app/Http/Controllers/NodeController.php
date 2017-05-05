<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Node;
use App\Taxonomy;
use App\Vocabulary;
use App\Image;
use DB;
use Carbon\Carbon;
use Storage;
use File;
use App\Http\Requests\UploadRequest;


class NodeController extends Controller
{

  public function alphabet($request = null, $from = 192, $to = 223) {

        if(isset($request->q)) { $q = $request->q; } else { $q = ''; }

        $abc = array();
        $res = [];

        foreach (range(chr(0xC0), chr(0xDF)) as $b)
        {
            $abc = iconv('CP1251', 'UTF-8', $b);

            if($q == $abc)
                {
                    $res[] = '<li class="active"><span>'.$abc.'</span></li>';
                } else {
                    $res[] = '<li><a href="/search/'.$abc.'">'.$abc.'</a></li>';
                }
            
        }

        return $res;

    }


    public function index()
    {
        $nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->where('status', true)->paginate(18);
        $alphabet = $this->alphabet();
        return view('node.index', compact('nodes', 'alphabet'));
    }

    public function search_f(Request $request)
    {
        $nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->where('status', true)->where('title', 'like', $request->q . '%')->paginate(18);
        $alphabet = $this->alphabet($request);
        return view('node.index', compact('nodes', 'alphabet'));
    }

    public function search(Request $request)
    {
        $nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->where('status', true)->where('title', 'like', '%' . $request->q . '%')->paginate(18);
        $alphabet = $this->alphabet($request);
        return view('node.index', compact('nodes', 'alphabet'));
    }


    public function search_post(Request $request)
    {   
        return redirect()->route('node.search', $request->q);
    }

    public function show($id)
    {
        $node = Node::with('taxonomy', 'taxonomy.vocabulary')->where('status', true)->findOrFail($id);
       # if(empty($node)) { return abort('404'); }
        return view('node.show', compact('node'));
    }


    public function edit($id)
    {
        $node = Node::with('taxonomy', 'taxonomy.vocabulary')->find($id);
        $vocabulary = Vocabulary::get();
        return view('node.edit', compact('node', 'vocabulary'));
    }

    public function saveImage(Request $request, $dir, $field) {

        if($request->hasFile($field) and $request->file($field)->isValid()) {
            $image = [];
            $request_image = $request->file($field);
            $filehash = md5(md5_file($request_image->getpathname()).time());
            $image['filename'] = $filehash.'.'.$request_image->getClientOriginalExtension();
            $image['uri'] = $dir.'/'.$image['filename'];
            $image['filesize'] = $request_image->getsize();
            $image['filemime'] = $request_image->getmimeType();

            $request->image->storeAs('public', $image['uri']);

            $img = new Image;
            $img->fill($image);
            $img->save();

            return $img;

        }

        return false;

    }

    public function update(Request $request, $id = null)
    {       

            $photo = $this->saveImage($request, 'photo', 'image');

            /*
            foreach ($request->gallery as $gallery) {
                echo dump($gallery);
            }
            dd($request->get());
            $gallery = $this->saveImage($request, 'gallery', 'gallery');
            */
            

        $data = $request->all();

        if(!isset($data['status'])) { $data['status'] = false; }
        
        unset($data['vocabulary']);

        $sync = [];
        foreach ($request->vocabulary as $vocabulary_id => $name) {
           if(!empty($name)){
             $term = Taxonomy::firstOrCreate(['name' => $name, 'vocabulary_id' => $vocabulary_id]);
             $sync[] = $term->id;
           }
        }

        $node = Node::find($id);
        $node->fill($data);
        $node->taxonomy()->sync($sync);
        if(isset($photo)) { $node->image()->attach($photo); }
        $node->save();
        return back();

    }

/*    public function term($id)
    {
        $taxonomy = Taxonomy::find($id);
        dump($taxonomy->vocabulary);
    }*/

}
