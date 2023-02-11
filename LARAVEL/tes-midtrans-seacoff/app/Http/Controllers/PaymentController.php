<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class PaymentController extends Controller
{

    public function index()
    {
        return 'wdwwd';
    }


    public function payment(Request $request)
    {
        $payload = $request->getContent();
        $json = json_decode($payload, true);

        if (isset($json)) {
            $totall = end($json)['totall'];
            array_pop($json);
        }



        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => isset($totall) ? $totall : 10,
            ),
            'customer_details' => array(
                'first_name' => 'fahmi',
                'last_name' => '',
                'email' => 'fahmiiwan86@gmail.com',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('payment', [
            'snapToken' => $snapToken
        ]);
    }
}
