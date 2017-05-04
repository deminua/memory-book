<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;
use App\Taxonomy;
use App\Vocabulary;
use App\Image;
use DB;
use Carbon\Carbon;
use Storage;

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
        $nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->paginate(18);
        $alphabet = $this->alphabet();
        return view('node.index', compact('nodes', 'alphabet'));
    }

    public function search_f(Request $request)
    {
        $nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->where('title', 'like', $request->q . '%')->paginate(18);
        $alphabet = $this->alphabet($request);
        return view('node.index', compact('nodes', 'alphabet'));
    }

    public function search(Request $request)
    {
        $nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->where('title', 'like', '%' . $request->q . '%')->paginate(18);
        $alphabet = $this->alphabet($request);
        return view('node.index', compact('nodes', 'alphabet'));
    }


    public function search_post(Request $request)
    {   
        return redirect()->route('node.search', $request->q);
    }

    public function show($id)
    {
        $node = Node::with('taxonomy', 'taxonomy.vocabulary')->find($id);
        return view('node.show', compact('node'));
    }


/*    public function term($id)
    {
        $taxonomy = Taxonomy::find($id);
        dump($taxonomy->vocabulary);
    }*/

}
