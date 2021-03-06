<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = ['amount', 'currency', 'description', 'order_id', 'status', 'data'];

    public function setDataAttribute($value = [])
    {
        $this->attributes['data'] = json_encode($value, true);
    }

    public function getStatus()
    {
        $data = json_decode($this->data, true);
        $status = $data['status'] ?? '';

        return config("liqpay.statuses.$status", '');
    }
}
