<?php


namespace School\Shop\Payment\Paypal;


class ConfirmCheckout
{

    public function __construct(){
    }

    public function checkPayment(){
        var_dump($_POST);
    }
}
(new ConfirmCheckout())->checkPayment();