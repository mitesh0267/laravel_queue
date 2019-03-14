<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Illuminate\Queue\Jobs\Job;
use App\Jobs\ProcessPodcast;
use Mail;
class HomeController extends Controller
{
    //

    public function index()
    {
        return view()->make("home.index");
    }

    public function send()
    {

        /*Log::info("Request cycle without Queues started");
        Mail::send('email.welcomeEmail', ['data'=>'data'], function ($message) {

            $message->from(env('MAIL_USERNAME'), 'ms');
            $message->to('mitesh.sathvara@knowarth.com');

        });
        Log::info("Request cycle without Queues finished");*/
        Mail::send('email.welcomeEmail', ['data'=>'data'], function ($message) {

            $message->from(env('MAIL_USERNAME'), 'ms');
            $message->to('mitesh0267@gmail.com');

        });
            Log::info("Request Cycle with Queues Begins mitesh");
        $data = [1,2,3];
       // ProcessPodcast::dispatch()->onQueue('high');
      //  ProcessPodcast::dispatch($data);
        //ProcessPodcast::dispatch()->onQueue('emails');
        //ProcessPodcast::dispatch()->delay(now()->addMinutes(1));

        //ProcessPodcast::dispatch()->onQueue('processing');;
        //ProcessPodcast::dispatch()->onConnection('sqs');

        Log::info("Request Cycle with Queues Ends miteshend");
        /*Mail::send('email.welcomeEmail', ['data'=>'data'], function ($message) {

            $message->from(env('MAIL_USERNAME'), 'ms');
            $message->to('mitesh.sathvara@knowarth.com');

        });*/
    }
}
