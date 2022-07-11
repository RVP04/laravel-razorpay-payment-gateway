<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('products', 'Vidhyaprakash\RazorpayPaymentGateway\Http\Controllers\ProductsController@index')->name('products.index');
    Route::get('payment-process/{product}', 'Vidhyaprakash\RazorpayPaymentGateway\Http\Controllers\RazorpayController@payment_process_page')->name('payment-process-page');
    Route::POST('payment-status', 'Vidhyaprakash\RazorpayPaymentGateway\Http\Controllers\RazorpayController@payment_status_page')->name('payment-status-page');
});
