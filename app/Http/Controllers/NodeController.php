<?php

namespace App\Http\Controllers;

use App\Image;
use App\Node;
use App\Taxonomy;
use App\Vocabulary;
use File;
use Illuminate\Http\Request;

class NodeController extends Controller {

	public function alphabet($request = null, $from = 192, $to = 223) {

		if (isset($request->q)) {$q = $request->q;} else { $q = '';}

		$abc = array();
		$res = [];

		foreach (range(chr(0xC0), chr(0xDF)) as $b) {
			$abc = iconv('CP1251', 'UTF-8', $b);

			if ($abc != 'Ъ' && $abc != 'Ы' && $abc != 'Ь' && $abc != 'Й' && $abc != 'Э') {
				if ($q == $abc) {
					$res[] = '<li class="active"><span>' . $abc . '</span></li>';
				} else {
					$res[] = '<li><a href="/search/' . $abc . '">' . $abc . '</a></li>';
				}
			}

		}

		return $res;

	}

	public function index() {
		$nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook');
		if (!auth()->check()) {$nodes->where('status', true);}
		$nodes->orderBy('updated_at', 'desc');
		$nodes = $nodes->paginate(18);
		$alphabet = $this->alphabet();
		return view('node.index', compact('nodes', 'alphabet'));
	}

	public function noPublic() {
		$nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook');
		$nodes->where('status', false);
		$nodes->orderBy('updated_at', 'desc');
		$nodes = $nodes->paginate(18);
		$alphabet = $this->alphabet();
		return view('node.index', compact('nodes', 'alphabet'));
	}

	public function search_f(Request $request) {
		$nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->where('status', true)->where('title', 'like', $request->q . '%')->paginate(18);
		$alphabet = $this->alphabet($request);
		return view('node.index', compact('nodes', 'alphabet'));
	}

	public function search(Request $request) {
		$nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'memorybook')->where('status', true)->where('title', 'like', '%' . $request->q . '%')->paginate(18);
		$alphabet = $this->alphabet($request);
		return view('node.index', compact('nodes', 'alphabet'));
	}

	public function search_post(Request $request) {
		return redirect()->route('node.search', $request->q);
	}

	public function show($id) {

		$node = Node::with('taxonomy', 'taxonomy.vocabulary');
		if (!auth()->check()) {$node->where('status', true);}
		$node = $node->findOrFail($id);
		if ($node->type == 'memorybook') {$node->type = 'node';}
		return view($node->type . '.show', compact('node'));
	}

	public function create() {
		$node = new Node;
		$vocabulary = Vocabulary::get();
		return view('node.create', compact('node', 'vocabulary'));
	}

	public function edit($id) {
		$node = Node::with('taxonomy', 'taxonomy.vocabulary')->find($id);
		$vocabulary = Vocabulary::get();
		return view('node.edit', compact('node', 'vocabulary'));
	}

	public function saveImage(Request $request, $dir, $field) {

		if ($request->hasFile($field) and $request->file($field)->isValid()) {
			$image = [];
			$request_image = $request->file($field);
			$filehash = md5(md5_file($request_image->getpathname()) . time());
			$image['filename'] = $filehash . '.' . $request_image->getClientOriginalExtension();
			$image['uri'] = $dir . '/' . $image['filename'];
			$image['filesize'] = $request_image->getsize();
			$image['filemime'] = $request_image->getmimeType();
			if ($image['filemime']) {
				$mime = explode('/', $image['filemime']);
				if ($mime[0] != 'image') {
					return false;
				}
			}
			$request->image->storeAs('public', $image['uri']);

			$img = new Image;
			$img->fill($image);
			$img->save();

			return $img;

		}

		return false;

	}

	public function saveImages(Request $request, $dir, $field) {

		if (count($request->$field) >= 1) {

			$gallery = [];

			foreach ($request->file($field) as $g) {
				$image = [];
				$request_image = $g;
				$filehash = md5(md5_file($request_image->getpathname()) . time());
				$image['filename'] = $filehash . '.' . $request_image->getClientOriginalExtension();
				$image['uri'] = $dir . '/' . $image['filename'];
				$image['filesize'] = $request_image->getsize();
				$image['filemime'] = $request_image->getmimeType();

				if ($image['filemime']) {
					$mime = explode('/', $image['filemime']);
					if ($mime[0] == 'image') {

						$g->storeAs('public', $image['uri']);

						$img = new Image;
						$img->fill($image);
						$img->save();

						$gallery[] = $img;

					}
				}

			}

			return $gallery;

		}

		return false;

	}

	public function update(Request $request, $id = null) {

		$photo = $this->saveImage($request, 'photo', 'image');
		$gallery = $this->saveImages($request, 'gallery', 'gallery');

		$data = $request->all();

		if (!isset($data['status'])) {$data['status'] = false;}

		unset($data['vocabulary']);

		$sync = [];
		foreach ($request->vocabulary as $vocabulary_id => $name) {
			if (!empty($name)) {
				$term = Taxonomy::firstOrCreate(['name' => $name, 'vocabulary_id' => $vocabulary_id]);
				$sync[] = $term->id;
			}
		}

		$node = Node::find($id);
		$node->fill($data);
		$node->taxonomy()->sync($sync);
		if (isset($photo)) {$node->image()->attach($photo);}

		if (isset($gallery) and is_array($gallery)) {$node->gallery()->attach(array_pluck($gallery, 'id'));}
		$node->save();
		return back();

	}

	public function store(Request $request) {

		$photo = $this->saveImage($request, 'photo', 'image');
		$gallery = $this->saveImages($request, 'gallery', 'gallery');

		$data = $request->all();

		if (!isset($data['status'])) {$data['status'] = false;}
		$data['type'] = 'memorybook';

		unset($data['vocabulary']);

		$sync = [];
		foreach ($request->vocabulary as $vocabulary_id => $name) {
			if (!empty($name)) {
				$term = Taxonomy::firstOrCreate(['name' => $name, 'vocabulary_id' => $vocabulary_id]);
				$sync[] = $term->id;
			}
		}

		if (empty($sync)) {$sync = false;}

		$node = new Node;
		$node->fill($data);
		$node->save();

		if (isset($sync)) {$node->taxonomy()->attach($sync);}
		if (isset($photo)) {$node->image()->attach($photo);}
		if (isset($gallery) and is_array($gallery)) {$node->gallery()->attach(array_pluck($gallery, 'id'));}

		return redirect()->route('node.index')->with('status', __('node.you_data_saved'));

	}

	public function term($id) {

		$nodes = Node::with('image')->where('status', true)->whereHas('tags', function ($query) use ($id) {
			$query->where('taxonomy_term_data.id', $id);
		})->paginate(18);

		$term = Taxonomy::find($id);

		return view('term.index', compact('nodes', 'term'));
	}

	public function gallery() {
		$nodes = Node::with('taxonomy', 'taxonomy.vocabulary', 'image')->where('type', 'gallery')->where('status', true)->paginate(18);
		$alphabet = $this->alphabet();
		return view('gallery.index', compact('nodes', 'alphabet'));
	}

}
