<?php

use Razorpay\Api\Api;

class RazorpayService
{
    protected $api;

    public function __construct()
    {
        $keyId = env('RAZORPAY_KEY');
        $keySecret = env('RAZORPAY_SECRET');

        $this->api = new Api($keyId, $keySecret);
    }

    public function createOrder($amount, $currency = 'INR')
    {
        $orderData = [
            'amount' => $amount * 100, // Razorpay expects amount in paise
            'currency' => $currency,
            'payment_capture' => 1
        ];

        try {
            $order = $this->api->order->create($orderData);
            return $order;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function verifyPayment($paymentId, $orderId, $signature)
    {
        $attributes = [
            'razorpay_order_id' => $orderId,
            'razorpay_payment_id' => $paymentId,
            'razorpay_signature' => $signature
        ];

        try {
            $this->api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
