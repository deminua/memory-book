<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Node;
use App\Image;

class NodeComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    #protected $nodes;
    public $nodes = [];

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    // public function __construct()
    // {
    //     // Dependencies automatically resolved by service container...
    //     $this->nodes = $nodes;
    // }

    public function __construct()
    {	
    	$this->nodes['lastnodes'] = Node::where('type', 'memorybook')->orderBy('updated_at', 'desc')->limit(12);
    	#$this->nodes['mainnodes'] = Node::with('image')->where('type', 'memorybook')->orderBy('updated_at', 'desc')->limit(5);
    	#$this->nodes['mainnodes'] = Node::has('images')->limit(3);
        $this->nodes['mainnodes'] = Node::with('image')->has('image')->orderBy('updated_at', 'desc')->limit(8);
        #images
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view)
    {
        #$view->with('count', $this->nodes->count());
    	$view->with('latestNodes', $this->nodes['lastnodes']);
    	$view->with('mainNodes', $this->nodes['mainnodes']);
    }
}