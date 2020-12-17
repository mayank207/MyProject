<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Exception;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
        protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {

        $this->details = $details;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   try{
          return $this->view('testmail')->with("details",$this->details);
            }

             catch(Exception $exception)
          {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');
          }

    }
}
