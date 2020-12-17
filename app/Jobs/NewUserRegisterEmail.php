<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUserMail;



class NewUserRegisterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $hr = null;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hr)
    {
        $this->hr =$hr;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        
         Mail::to($this->$hr)->send(new RegisterUSerMail());

    }
}
