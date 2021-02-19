<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function index() {
    $gateway = new \Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => 'qcb7wf9kzqnqwmpv',
      'publicKey' => 'pyd4m95j45tgtkqk',
      'privateKey' => 'd1cb5596101a2ec7de8fc5565ec418b5'
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
        'merchantId' => 'qcb7wf9kzqnqwmpv',
        'publicKey' => 'pyd4m95j45tgtkqk',
        'privateKey' => 'd1cb5596101a2ec7de8fc5565ec418b5'
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
