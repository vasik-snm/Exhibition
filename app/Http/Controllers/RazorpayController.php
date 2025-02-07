<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RazorpayService;

class RazorpayController extends Controller
{
    protected $razorpayService;

    public function __construct(RazorpayService $razorpayService)
    {
        $this->razorpayService = $razorpayService;
    }

    public function createOrder(Request $request)
    {
        $order = $this->razorpayService->createOrder($request->amount);

        if ($order) {
            return view('Stall.payment', compact('order'));
        }

        return redirect()->back()->with('error', 'Unable to create Razorpay order.');
    }

    public function handlePaymentCallback(Request $request)
    {
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');

        $isVerified = $this->razorpayService->verifyPayment($paymentId, $orderId, $signature);

        if ($isVerified) {
            // Handle success
            return redirect()->route('payment.success');
        } else {
            // Handle failure
            return redirect()->route('payment.failure');
        }
    }

    public function success()
    {
        return view('Stall.payment-success');
    }

    public function failure()
    {
        return view('Stall.payment-failure');
    }

    public function index()
    {
        return view('Stall.payment');
    }
    public function webhook(Request $request) {
        dd($request->all());

    }

}
