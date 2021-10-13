<?php
namespace App\Classes;

use  Illuminate\Support\Facades\Log;

class Loger{

    public function log($level, $message){
        //tenta adicionar a mensagem de identiificacao aqui

        if(session()->has('usuario')){
            $message = '['.session('usuario')->usuario.'] - ' . $message; 
        }else{
            $message = '[N/A] - '  .$message; 
        }

        //regista um mensagem nos logs
        Log::channel('meuLog')->$level($message); 

    }

}