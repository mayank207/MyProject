<?php

namespace App\Jobs;

use App\Mail\AdminMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Adminjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user,$subject,$description;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$subject,$description)
    {
        $this->user=$user;
        $this->subject=$subject;
        $this->description=$description;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->user as $item){
            Mail::to($item->email)->send(new AdminMail($item->email,$this->subject,$this->description));
        }
  }

}