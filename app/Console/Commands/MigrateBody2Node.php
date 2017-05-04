<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Node;

class MigrateBody2Node extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dem:copybody2node';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy description body to node table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if ($this->confirm('Do you wish to continue?')) {
            $node = Node::first();
            $this->info($node);
        }


    }
}
