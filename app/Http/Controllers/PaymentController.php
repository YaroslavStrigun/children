<?php

namespace App\Http\Controllers;


use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function savePaymentData(Request $request)
    {
        if ($request->has('data') && $request->has('signature'))
        {
            $data = $request->input('data');
            $signature = $request->input('signature');
            $keys = PaymentService::getKeys();
            $private_key = $keys['private'];

            $data_signature = base64_encode( sha1(
                $private_key .
                $data .
                $private_key
                , 1 ));

            if ($data_signature == $signature && !empty($data)) {
               $status = PaymentService::saveCheckout($data);
            } else {
                $status = config('liqpay.statuses.failure');
            }

            session()->flash('msg', $status);

            return redirect()->route('page', ['slug' => 'how-to-help']);
        }
    }
}
