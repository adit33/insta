<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Schedule;
use Crypt;

class Upload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $schedule;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($schedule)
    {
        $this->schedule=$schedule;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
        // $action = new Action;
        // $action->uploadPhoto($schedules);
        $username = '';
        $password = '';
        $debug = true;
        $truncatedDebug = false;
        //////////////////////
        /////// MEDIA ////////
        $photoFilename = '';
        $captionText = '';
        //////////////////////
        $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);

        // if you want only a caption, you can simply do this:
            try {
                $ig->login($this->schedule['insta_account']['user_id'],Crypt::decrypt($this->schedule['insta_account']['password']));
            } catch (\Exception $e) {
                    echo 'Something went wrong: '.$e->getMessage()."\n";
                exit(0);
            }
            try {
                        $photoFilename=public_path($this->schedule['photo']);
                        $metadata = ['caption' => $this->schedule['caption']];
                        $ig->timeline->uploadPhoto($photoFilename, $metadata);
            } catch (\Exception $e) {
                        echo 'Something went wrong: '.$e->getMessage()."\n";
            }
    }
}
