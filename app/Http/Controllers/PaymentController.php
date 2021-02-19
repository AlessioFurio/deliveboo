<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function index() {
    $gateway = new \Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => 'z9pjj9ss4g28vcph',
      'publicKey' => '6n75pgqp5vxwrfxc',
      'privateKey' => '0f5fd1da7e1fec8268fd9723a81b559d'
    ]);

    $clientToken = $gateway->clientToken()->generate();

    $data = [
        'clientToken' => $clientToken
    ];

    return view('guest.payments.index', $data);
    }

  public function transaction() {
    $nonceFromTheClient = $_POST["payment_method_nonce"];
    /* Use payment method nonce here */
    $gateway = new \Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'z9pjj9ss4g28vcph',
        'publicKey' => '6n75pgqp5vxwrfxc',
        'privateKey' => '0f5fd1da7e1fec8268fd9723a81b559d'
    ]);

    $result = $gateway->transaction()->sale([
      'amount' => '10.00',
      'paymentMethodNonce' => $nonceFromTheClient,
      // 'deviceData' => $deviceDataFromTheClient,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);

    $data = [
      'nonce' => $nonceFromTheClient,
      'result' => $result
    ];

    return view('guest.payments.transaction', $data);
  }

}
