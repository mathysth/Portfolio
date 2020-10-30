<?php
session_start();
require '../../../../../vendor/autoload.php';
require '../../../../../config/website.php';
require '../../../Database/Database.php';
require 'Basket.php';
require 'Product.php';
require 'TransactionFactory.php';

class Payment{
    public function __construct()
    {
        $this->setupPayment();
    }

    private function setupPayment(){
        $ids = \School\Config\Website::PAYPAL_KEY;
        $basket = \School\Shop\Payment\Paypal\Basket::items();

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $ids['id'],
                $ids['secret']
            )
        );

        $payment = new \PayPal\Api\Payment();
        $payment->addTransaction(\School\Shop\Payment\Paypal\TransactionFactory::fromBasket($basket));
        $payment->setIntent('sale');
        $redirectUrls = (new \PayPal\Api\RedirectUrls())
            ->setReturnUrl('http://localhost:8080/elsa/sandbox/E-commerce-PHP/checkout')
            ->setCancelUrl('http://localhost:8080/elsa/sandbox/E-commerce-PHP/error');
        $payment->setRedirectUrls($redirectUrls);
        $payment->setPayer((new \PayPal\Api\Payer())->setPaymentMethod('paypal'));

        try {
            $payment->create($apiContext);
            echo json_encode([
                'id' => $payment->getId()
            ]);
        } catch (\PayPal\Exception\PayPalConnectionException $e) {
            var_dump(json_decode($e->getData()));
        }
    }
}
new Payment();