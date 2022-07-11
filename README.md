# Razor Pay Payment Gateway Package

## Steps to usage the package

This will help developers to integerate RazorPay Payment Gateway With our Existing Application. Lets see how to use our package. 

Note: Ensure that you have already installed laravel/ui and auth scaffolding. 

```sh
  composer require vidhyaprakash/razorpay-payment-gateway
```

Update your .env file with API_KEY and Secret (you can fetch this from Razorpay dashboard)
```
    RAZORPAY_KEY="********************"
    RAZORPAY_SECRET="************"
```

This package has migration, model, controllers, config and views ready for use. It uses products and orders table in migration. Products table is used to store all the products that you want to sell. Show all the products from the index view and from that index use a href tag to call the route (GET) payment-process-page with product id. The sample page is given in views. 


