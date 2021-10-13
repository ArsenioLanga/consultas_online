<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email_sent extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $idade;
    public $morada;
    public $data;
    public $hora;
    public $medico; 

    public function __construct($nome, $idade, $morada, $data, $hora, $medico)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->morada = $morada;
        $this->data = $data;
        $this->hora = $hora;
        $this->medico = $medico;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Marcação da consulta online')
                    ->view('emails.email_confirm_sent');
    }
}
