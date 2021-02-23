<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;
use App\Payment;

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

  public function transaction(Request $request) {

    $data = $request->all();

    $payment_method_nonce = $data['payment_method_nonce'];

    $new_buyer = new Buyer();
    $new_buyer->fill($data);
    $new_buyer->save();

    // $new_payment = new Payment();
    // $new_payment->fill($new_buyer->id);

    $gateway = new \Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => 'qcb7wf9kzqnqwmpv',
      'publicKey' => 'pyd4m95j45tgtkqk',
      'privateKey' => 'd1cb5596101a2ec7de8fc5565ec418b5'
    ]);

    $result = $gateway->transaction()->sale([
      'amount' => '10.00',
      'paymentMethodNonce' => $payment_method_nonce,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);

    $data = [
      'result' => $result
    ];

    return view('guest.payments.transaction', $data);
  }

}
