<?php
declare(strict_types = 1);

interface NotifierInterface{
    public function send(string $message):void;
}

class EmailNotifier implements NotifierInterface{
    public function send(string $message):void{
        echo "Enviando email con mensaje: $message\n";
    }
}


class SmsNotifier implements NotifierInterface{
    public function send(string $message):void{
        echo "Enviando email con mensaje: $message\n";
    }
}