<?php

namespace App\Console\Commands;

use App\Mail\Common;
use App\Models\Project;
use Illuminate\Console\Command;
use App\Http\Controllers\HomeController;
use Mail;

class mailToClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailto:client';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        (new HomeController())->warnMailToProjectOwner();
    }
}
