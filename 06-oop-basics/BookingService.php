<?php
declare(strict_types=1);

class Customer{
    public function __construct(public string $name,public string $email){}
}

class Room{
    public function __construct(public string $name,public readonly float $pricePerNight){}
}

interface PaymentMethod{
    public function pay(float $amount): string;
}

class CardPayment implements PaymentMethod{
    public function pay(float $amount):string{
        return "Pago con tarjeta aprobado por un valor de: $amount";
    }
}

class QrPayment implements PaymentMethod{
    public function pay(float $amount): string{
        return "Pago con QR aprobado por un valor de: $amount";
    }
}

final class BookingService{
    public function reserve(
        Customer $customer,
        Room $room,
        int $nights,
        PaymentMethod $paymentMethod
    ):void{
        $subtotal = $room->pricePerNight * $nights;
        $discount = 0; //TODO: Implementar descuento
        $total = $subtotal - ($subtotal * $discount/100);
        $paymentResult = $paymentMethod->pay($total);
        echo "Cliente: {$customer->name}\n";    
        echo "Habitacion: {$room->name}\n";    
        echo "Noches: $nights\n";  
        echo $paymentResult."\n";    
    }
}
$customer = new Customer(
    name:"Johand",
    email:"Jekser09@gmail.com"
);
$room = new Room(
    name:"Habitacion doble",
    pricePerNight:120
);
$nights=3;
$payment = new CardPayment();
$service = new BookingService();
$service->reserve(
    customer:$customer,
    room:$room,
    nights:$nights,
    paymentMethod:$payment
);