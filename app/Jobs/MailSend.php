<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendPasswordResetLink;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MailSend implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $hr;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hr)
    {
        $this->hr = $hr;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
        Mail::to('mayank@gmail.com')->send(new SendPasswordResetLink());
    }
}
