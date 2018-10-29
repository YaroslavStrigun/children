<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'path'
    ];

    public function post()
    {
        return $this->belongsTo('App\Model\Post');
    }

}
