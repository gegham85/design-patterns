<?php

interface PaymentGateway
{
    public function processPayment($amount);
}

// ------------------------------------------------------------

class PayPalGateway implements PaymentGateway
{
    public function processPayment($amount)
    {
        return "Processing payment of $" . $amount . " through PayPal.";
    }
}

class StripeGateway implements PaymentGateway
{
    public function processPayment($amount)
    {
        return "Processing payment of $" . $amount . " through Stripe.";
    }
}

// ------------------------------------------------------------

abstract class CheckoutProcess
{
    protected PaymentGateway $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    abstract public function checkout($amount);
}

// ------------------------------------------------------------

class StandardCheckout extends CheckoutProcess
{
    public function checkout($amount)
    {
        // ... some standard checkout logic ...
        return $this->gateway->processPayment($amount);
    }
}

class OneClickCheckout extends CheckoutProcess
{
    public function checkout($amount)
    {
        // ... some one-click specific logic ...
        return $this->gateway->processPayment($amount);
    }
}

// ------------------------------------------------------------
// Usage:

// Use a standard checkout with Stripe
$stripeGateway = new StripeGateway();
$standardCheckout = new StandardCheckout($stripeGateway);
echo $standardCheckout->checkout(100);
// Output: Processing payment of $100 through Stripe.

echo "\n";

// Use a one-click checkout with PayPal
$paypalGateway = new PayPalGateway();
$oneClickCheckout = new OneClickCheckout($paypalGateway);
echo $oneClickCheckout->checkout(50);
// Output: Processing payment of $50 through PayPal.
