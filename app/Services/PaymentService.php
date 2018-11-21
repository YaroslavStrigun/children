<?php

namespace App\Services;


use App\Http\Controllers\Controller;

abstract class PaymentService extends Controller
{
    static public function getKeys()
    {
        return [
            'public' => env('LIQ_PAY_PUBLIC_KEY'),
            'private' => env('LIQ_PAY_PRIVATE_KEY')];
    }

    static public function getPaymentWidget()
    {
        $liqpay = new \LiqPay(...array_values(self::getKeys()));

        $html_form = $liqpay->cnb_form([
            'action' => 'paydonate',
            'amount' => '50',
            'currency' => 'UAH',
            'description' => 'Благотворительное пожертвование для фонда "Поддержка"',
            'version' => '3',
            'sandbox' => 1,
            'result_url' => route('save.payment.data')
        ]);

        return $html_form;

    }

    static public function savePaymentData($data)
    {
        $decode_data = base64_decode($data);
        $data_array = json_decode($decode_data, true);
        dd($data_array);

    }

}
