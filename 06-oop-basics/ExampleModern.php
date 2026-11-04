<?php
declare(strict_types=1);

/**
 * 1. INTERFACE ("What it CAN DO" - Capability contract)
 * Not every payment method supports automatic refunds (e.g., cash does not).
 * No properties or implementation logic here, only the contract.
 */
interface RefundableInterface{
    public function refund(): void;
}

/**
 * 2. ABSTRACT CLASS ("What it IS" - Shared base identity)
 * Cannot be instantiated directly with `new PaymentProcessor()`.
 * Holds shared state ($amount), shared logic (log), and forces child classes to implement process().
 */
abstract class PaymentProcessor{
    public float $amount {
        set(float $value) {
            if ($value <= 0) {
                throw new InvalidArgumentException("El monto debe ser mayor a 0");
            }
            $this->amount = $value;
        }
    }

    public function __construct(
        public readonly string $transactionId,
        float $amount,
    ) {
        $this->amount = $amount;
    }

    // Shared concrete method inherited by all child classes
    protected function log(string $action): void
    {
        echo "[TX: {$this->transactionId}] {$action} por \${$this->amount}\n";
    }

    // Abstract method: every child class is forced to define how it processes the payment
    abstract public function process(): void;
}

/**
 * 3. CONCRETE CLASS A: Extends the abstract base AND implements the interface
 */
final class CreditCardPayment extends PaymentProcessor implements RefundableInterface{
    public function __construct(
        string $transactionId,
        float $amount,
        private readonly string $lastFourDigits,
    ) {
        parent::__construct($transactionId, $amount);
    }

    #[Override]
    public function process():void{
        $this->log("Cobro con tarjeta terminada en {$this->lastFourDigits}");
    }

    #[Override]
    public function refund(): void{
        $this->log("Reembolso automático a tarjeta terminada en {$this->lastFourDigits}");
    }
}

/**
 * 4. CONCRETE CLASS B: Extends the abstract base, but does NOT implement RefundableInterface
 */
final class CashPayment extends PaymentProcessor{
    #[Override]
    public function process(): void
    {
        $this->log("Cobro en efectivo en sucursal");
    }
}

// --- Usage ---
$card = new CreditCardPayment(transactionId: "TX-101", amount: 250.00, lastFourDigits: "4242");
$cash = new CashPayment(transactionId: "TX-102", amount: 80.00);

$card->process();
$card->refund();

$cash->process();
