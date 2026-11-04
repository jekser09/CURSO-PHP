<?php
declare(strict_types = 1);

abstract class PaymentProccesor{
    protected float $amount;

    public function __construct(float $amount){
        $this->amount=$amount;
    }
    abstract public function process():void;
    public function log():void{
        echo "Pago por: {$this->amount}\n";
    }
}

class CreditCardPayment extends PaymentProccesor{
    public function process():void{
        $this->log();
        echo "Procesando con tarjeta de credito\n";
    }
}


class PaypalPayment extends PaymentProccesor{
    public function process():void{
        $this->log();
        echo "Procesando con Paypal\n";
    }
}

$paymentPaypal=new PaypalPayment(150);
$paymentPaypal->process();
$paymentCard=new CreditCardPayment(150);
$paymentCard->process();