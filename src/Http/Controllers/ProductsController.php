<?php

namespace Vidhyaprakash\RazorpayPaymentGateway\Http\Controllers;

use App\Http\Controllers\Controller;
use Vidhyaprakash\RazorpayPaymentGateway\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('razorpay::products.index')->with('products', $products);
    }
}
