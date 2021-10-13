<?php

namespace App\Classes;

class Enc{
    public function encriptar($valor){
        return bin2hex(openssl_encrypt($valor, 'aes-256-cbc', 'QUJWT67SHGbsuow83mfhTlM8Vq', 
        OPENSSL_RAW_DATA, 'AQS61uobQDFL81Tg'));
    }

    public function desencriptar($valor_encriptado){

        //Verificar se a has e valida
        if(strlen($valor_encriptado)%2 != 0){
            return null;
        }

        return openssl_decrypt(hex2bin($valor_encriptado), 'aes-256-cbc', 'QUJWT67SHGbsuow83mfhTlM8Vq',
         OPENSSL_RAW_DATA, 'AQS61uobQDFL81Tg');
    }
}