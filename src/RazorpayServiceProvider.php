<?php

namespace Vidhyaprakash\RazorpayPaymentGateway;

use Illuminate\Support\ServiceProvider;

class RazorpayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'razorpay');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/config/razorpay.php', 'razorpay');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/database/migrations/create_products.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_products_table.php'),
                __DIR__ . '/database/migrations/create_orders.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_orders_table.php'),
            ], 'migrations');
            $this->publishes([
                __DIR__ . '/config/razorpay.php'   =>  config_path('razorpay.php'),
            ]);
            $this->publishes([
                __DIR__ . '/views' => base_path('resources/views/razorpay'),
            ], 'views');
            $this->publishes([
                __DIR__ . '/Models' => base_path('app/Models'),
            ], 'Models');
            $this->publishes([
                __DIR__ . '/Http/Controllers' => base_path('app/Http\Controller'),
            ], 'Controllers');
        }
    }

    public function register()
    {
    }
}
