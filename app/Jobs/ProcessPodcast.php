<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use Log;
class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        //
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "mitesh";
        echo "<pre>";print_r($this->data);exit();

        Log::info(" Queues start");
        Mail::send('email.welcomeEmail', ['data'=>'data'], function ($message) {

            $message->from(env('MAIL_USERNAME'), 'ms');
            $message->to('mitesh.sathvara@knowarth.com');

        });
        Log::info("Queues finished");
    }
}
