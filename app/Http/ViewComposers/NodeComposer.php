<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Node;
use App\Image;

class NodeComposer
{

    public $nodes = [];

    public function __construct()
    {	
    	$this->nodes['lastnodes'] = Node::where('type', 'memorybook')->orderBy('updated_at', 'desc')->limit(14);
        $this->nodes['mainnodes'] = Node::with('image')->has('image')->orderBy('updated_at', 'desc')->limit(8);
        $this->nodes['gallery'] = Node::where('type', 'gallery')->with('image')->has('image')->orderBy('updated_at', 'desc')->limit(8);
    }

    public function compose(View $view)
    {
    	$view->with('latestNodes', $this->nodes['lastnodes']);
        $view->with('mainNodes', $this->nodes['mainnodes']);
        $view->with('gallery', $this->nodes['gallery']);
    }
}