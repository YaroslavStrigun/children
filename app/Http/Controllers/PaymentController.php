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

            if ($data_signature == $signature) {
               $status = PaymentService::savePaymentData($data);
            } else {
                $status = 'Ошибка сервера, попробуйте позже.';
            }

            return $status;

        }
    }
}
