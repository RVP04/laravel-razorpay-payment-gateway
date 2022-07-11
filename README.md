# Razor Pay Payment Gateway Package

[![Issues] (https://img.shields.io/github/issues/RVP04/laravel-razorpay-payment-gateway)] (https://github.com/RVP04/laravel-razorpay-payment-gateway/issues)

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

```
    http://url/products
```
The above url will show all products. (Requesting to add / seed your own data)

```
    http://url/payment-process/{product}
```
The above url will show the button which has integerated with razorpay ready to go for payments. 

```
    http://url/payment-status
```
The above url will verify the payment with razorpay and also add the payment information to the orders table. 


![Made with love in India](https://madewithlove.now.sh/in?heart=true&template=for-the-badge)
