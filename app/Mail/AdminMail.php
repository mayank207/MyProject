<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email,$subject,$description;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$subject,$description)
    {
        $this->email=$email;
        $this->subject=$subject;
        $this->description=$description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.adminmail')->with(['email'=>$this->email,'subject'=>$this->subject,'description'=>$this->description]);

    }
}