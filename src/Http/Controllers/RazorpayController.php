<?php

namespace Vidhyaprakash\RazorpayPaymentGateway\Http\Controllers;

use App\Http\Controllers\Controller;
use Vidhyaprakash\RazorpayPaymentGateway\Models\Product;
use Vidhyaprakash\RazorpayPaymentGateway\Models\Order;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


class RazorpayController extends Controller
{
    public function payment_process_page(Product $product)
    {
        $api = new Api(config('razorpay.razorpay_key'), config('razorpay.razorpay_secret'));
        $orderDetails = $api->order->create([
            'receipt' => now()->timestamp,
            'amount' => ($product->price) * 100,
            'currency' => 'INR',
        ]);
        $jsonData = [
            "key"   => config('razorpay.razorpay_key'),
            "amount" => ($product->price) * 100,
            "name"  => $product->name,
            "prefill"   => [
                "name"  =>  "Customer Name",
                "email" =>  auth()->user()->email,
                "contact"   =>  "+919999999999"
            ],
            "order_id"  =>  $orderDetails['id'],
        ];
        Order::create([
            'user_id'   => auth()->user()->id,
            'product_id'    => $product->id,
            'order_id'  => $orderDetails['id'],
            'amount'    =>  $product->price,
        ]);
        return view('razorpay::razorpay.payment-process')
            ->with('data', $jsonData)
            ->with('product', $product);
    }

    public function payment_status_page(Request $request)
    {
        $api = new Api(config('razorpay.razorpay_key'), config('razorpay.razorpay_secret'));

        $attributes = [
            'razorpay_order_id' => $request->input('rzp_order_id'),
            'razorpay_payment_id' => $request->input('rzp_pymnt_id'),
            'razorpay_signature' => $request->input('rzp_signature'),
        ];
        try {
            $api->utility->verifyPaymentSignature($attributes);
            Order::where('order_id', $request->input('rzp_order_id'))->update([
                'razorpay_payment_id'   => $request->input('rzp_pymnt_id'),
                'razorpay_signature'    => $request->input('rzp_signature'),
                'status'    => 'Paid'
            ]);
            $success = true;
        } catch (SignatureVerificationError $e) {
            $success = false;
        }
        return view('razorpay::razorpay.payment-status')->with('status', $success);
    }
}
