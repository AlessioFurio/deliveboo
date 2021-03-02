<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;
use App\User;
use App\Payment;
use App\Restaurant;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailFromOrder;
use App\Mail\CustomerConfirmMail;

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

    $new_payment = new Payment();
    $new_payment->fill($data);
    $new_payment->buyer_id =$new_buyer->id;
    $new_payment->status = 2 ;
    $new_payment->payment_method_id = 2 ;
    $new_payment->save();


    $gateway = new \Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => 'qcb7wf9kzqnqwmpv',
      'publicKey' => 'pyd4m95j45tgtkqk',
      'privateKey' => 'd1cb5596101a2ec7de8fc5565ec418b5'
    ]);

    $result = $gateway->transaction()->sale([
      'amount' => $data['price'],
      'paymentMethodNonce' => $payment_method_nonce,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);

    // $data = [
    //   'result' => $result
    // ];
    // $request->session()->put('asd', 'asd');
    // dd($new_payment);
    // $user_id = Auth::user()->id;
    // dd($user_id = Auth::user()->email);

    $restaurant = Restaurant::where('id' , $new_payment->restaurant_id)->first();
    // dd($new_payment->restaurant_id);
    $user = User::where('id' , $restaurant->user_id)->first();
    $restaurant_mail = $user->email;

    Mail::to($restaurant_mail)->send(new MailFromOrder($new_payment));
    Mail::to($data['email'])->send(new CustomerConfirmMail($new_payment));

    return redirect()->route('welcome')->with(['transaction_result' => $result->success]);
  }

}
