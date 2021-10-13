<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email_confirm_message extends Mailable
{
    use Queueable, SerializesModels;

    public $purl_code;

    public function __construct()
    {
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Marcação da consulta')->view('emails.email_confirm_message_form');
    }
}
