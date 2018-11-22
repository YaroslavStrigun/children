<?php

namespace App\Services;


use App\Http\Controllers\Controller;
use App\Models\Checkout;

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

    static public function saveCheckout($data)
    {
        $decode_data = base64_decode($data);
        $data_array = json_decode($decode_data, true);

        $checkout = Checkout::create([
            'amount' => $data_array['amount'],
            'currency' => $data_array['currency'],
            'description' => $data_array['description'],
            'order_id' => $data_array['order_id'],
            'status' => $data_array['status'],
            'data' => $data_array
        ]);

        $status = $data_array['status'];
        $status = config("liqpay.statuses.$status", '');

        return $status;
    }

}
