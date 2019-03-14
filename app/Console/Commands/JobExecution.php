<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
class JobExecution extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:execution';

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
        //
        /*Mail::send('email.welcomeEmail', ['data'=>'data'], function ($message) {

            $message->from(env('MAIL_USERNAME'), 'ms');
            $message->to('mitesh.sathvara@knowarth.com');

        });*/

        $tries = env('QUEUE_EMAIL_TRIES');
        $retry = env('QUEUE_RETRY');
        $this->call('queue:retry', ["id"=> env('QUEUE_RETRY')]);

        $this->call('queue:work', [
            '--tries' => env('QUEUE_EMAIL_TRIES'),
            '--queue'=> 'emails'
        ]);
        // default
        exit();
        echo "success";
        //$this->call('queue:work');

    }
}
