<?php

namespace App\Http\ViewComposers;

use App\Node;
use Illuminate\View\View;

class NodeComposer {

	public $nodes = [];

	public function __construct() {
		$this->nodes['lastnodes'] = Node::where('type', 'memorybook')->where('status', true)->orderBy('updated_at', 'desc')->limit(14);
		$this->nodes['mainnodes'] = Node::with('image')->has('image')->orderBy('updated_at', 'desc')->where('status', true)->limit(8);
		$this->nodes['gallery'] = Node::where('type', 'gallery')->with('image')->has('image')->where('status', true)->orderBy('updated_at', 'desc')->limit(4);
	}

	public function compose(View $view) {
		$view->with('latestNodes', $this->nodes['lastnodes']);
		$view->with('mainNodes', $this->nodes['mainnodes']);
		$view->with('gallery', $this->nodes['gallery']);
	}
}