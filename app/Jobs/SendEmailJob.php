<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendMail;
use Mail;
use Exception;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {

        $this->details=$details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
       public function handle()
    {
       try{
        $email = new SendMail($this->details);
        Mail::to('mayank@gmail.com')->send($email);
        }
         catch(Exception $exception)
          {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
          }
    }
}
