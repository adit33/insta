<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Schedule;

class RunUpload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run schedule upload';

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
       $schedule=new Schedule;
       $schedule->uploadPhoto();
    }
}
