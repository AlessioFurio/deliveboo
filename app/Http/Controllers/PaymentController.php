<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;

class PaymentController extends Controller
{
  public function index() {
    $gateway = new \Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => '96bqgdfznc5j7zx5',
      'publicKey' => 'b783sm8569ztywqk',
      'privateKey' => '7eb649936b71225d258fe1467d61b1e5'
    ]);

    $clientToken = $gateway->clientToken()->generate();

    $data = [
        'clientToken' => $clientToken
    ];

    return view('guest.payments.index', $data);
    }

  public function transaction(Request $request) {
    // $nonceFromTheClient = $_POST["payment_method_nonce"];
    /* Use payment method nonce here */
      $data = $request->all();

      $payment_method_nonce = $data['payment_method_nonce'];


      $new_buyer = new Buyer();
      $new_buyer->fill($data);
      $new_buyer->save();


        $gateway = new \Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => '96bqgdfznc5j7zx5',
        'publicKey' => 'b783sm8569ztywqk',
        'privateKey' => '7eb649936b71225d258fe1467d61b1e5'
    ]);

    $result = $gateway->transaction()->sale([
      'amount' => '10.00',
      'paymentMethodNonce' => $payment_method_nonce,
      // 'deviceData' => $deviceDataFromTheClient,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);

    $data = [
      // 'nonce' => $nonceFromTheClient,
      'result' => $result
    ];

    return view('guest.payments.transaction', $data);
  }

}
