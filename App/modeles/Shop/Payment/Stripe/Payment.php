<?php
namespace School\Shop\Payment\Stripe;

use School\Controler\controler_default;
session_start();
require '../../../../Controler/Controler_default.php';
require '../../../Database/Database.php';
require '../../../../../config/website.php';

class Payment{

    public function __construct()
    {
        $this->setupPayment();
    }

    public function setupPayment(){
        // Stripe API configuration
        define('STRIPE_API_KEY', \School\Config\Website::STRIPE_API_KEY);
        define('STRIPE_PUBLISHABLE_KEY', \School\Config\Website::STRIPE_PUBLISHABLE_KEY);
        define('STRIPE_SUCCESS_URL', \School\Config\Website::STRIPE_SUCCESS_URL);
        define('STRIPE_CANCEL_URL', \School\Config\Website::STRIPE_CANCEL_URL);

    // Include Stripe PHP library
        require_once '../../../../../vendor/autoload.php';

    // Set API key
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'Invalid Request!'
            )
        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $input = file_get_contents('php://input');
            $request = json_decode($input);
        }

        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode($response);
            exit;
        }

        if(!empty($request->checkoutSession)){
            // Create new Checkout Session for the order
            try {
                $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => $this->setupItem(),
                    'mode' => 'payment',
                    'success_url' => STRIPE_SUCCESS_URL.'?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => STRIPE_CANCEL_URL,
                ]);
            }catch(Exception $e) {
                $api_error = $e->getMessage();
            }

            if(empty($api_error) && $session){
                $response = array(
                    'status' => 1,
                    'message' => 'Checkout Session created successfully!',
                    'sessionId' => $session['id']
                );
            }else{
                $response = array(
                    'status' => 0,
                    'error' => array(
                        'message' => 'Checkout Session creation failed! '.$api_error
                    )
                );
            }
        }

// Return response
        echo json_encode($response);
    }

    private function getProductOnBasket(){
        return (new controler_default())->getProductOnBasket();
    }

    private function setupItem(){
        $arrayItem  = [];
        foreach ($this->getProductOnBasket()  as $item){
            $stripeAmount = round($item['price']*100, 2);
            $array = [
                'price_data' => [
                    'product_data' => [
                        'name' => $item['name'],
                        'metadata' => [
                            'pro_id' => $item['articles_id']
                        ]
                    ],
                    'unit_amount' => $stripeAmount,
                    'currency' => 'eur',
                ],
                'quantity' => $item['quantity'],
                'description' => $item['name'],
            ];
            array_push($arrayItem,$array);
        }
        return $arrayItem;
    }


}
new Payment();


