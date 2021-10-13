<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailTeste extends Mailable
{
    use Queueable, SerializesModels;

    public $nome_cliente;
    // public function __construct($cliente)
    public function __construct()
    {
        //este atributo fica automaticamento disponivel na view nao
        //precisa passar como argumento
        // $this->$nome_cliente = $cliente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nome_cliente = 'Arsenio Langa';
        return $this->view('emails.EmailTeste');
       // return $this->subject('Assunto do email')->view('emails.EmailTeste');

        //outra forma 
        //return $this->subject('Assunto do email')
        //            ->with('nome_cliente', 'Langa')
        //            ->with('produto', 'peca de automovel')
        //            ->view('emails.EmailTeste');
    }
}
