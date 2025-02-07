<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    // Step 1: Show payment form
    public function showForm()
    {
        return view('payment.form');
    }

    // Step 2: Create order and initiate Razorpay payment
    public function initiatePayment(Request $request)
    {
        $request->validate([
            'participant_name' => 'required|string',
            'store_name'       => 'required|string',
            'owner_name'       => 'required|string',
            'mobile_number'    => 'required|numeric',
            'email'            => 'required|email',
            'category'         => 'required|string',
            'table_size'       => 'required|numeric',
        ]);

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        // Create an order in Razorpay
        $order = $api->order->create([
            'amount' => $request->input('table_size') * 100, // Amount in paise
            'currency' => 'INR',
            'receipt' => uniqid(),
        ]);

        return view('payment.checkout', [
            'orderId' => $order['id'],
            'amount' => $request->input('table_size'),
            'participant_name' => $request->input('participant_name'),
            'mobile_number' => $request->input('mobile_number'),
            'email' => $request->input('email'),
        ]);
    }

    // Step 3: Handle Razorpay success callback
    public function paymentCallback(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            // Verify Razorpay Payment
            $attributes = [
                'razorpay_signature' => $request->input('razorpay_signature'),
                'razorpay_payment_id' => $request->input('razorpay_payment_id'),
                'razorpay_order_id' => $request->input('razorpay_order_id'),
            ];
            $api->utility->verifyPaymentSignature($attributes);

            // Payment success
            return redirect()->route('payment.success')->with('message', 'Payment Successful');
        } catch (\Exception $e) {
            // Payment failure
            return redirect()->route('payment.failure')->with('message', 'Payment Failed: ' . $e->getMessage());
        }
    }

    // Step 4: Success view
    public function success()
    {
        return view('payment.success');
    }

    // Step 5: Failure view
    public function failure()
    {
        return view('payment.failure');
    }
}
