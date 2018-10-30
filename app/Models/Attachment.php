<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'path',
        'roles'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function getRolesAttribute($value)
    {
        return json_decode($value);
    }

    public function setRolesAttribute($roles)
    {
        $this->attributes['roles'] = json_encode($roles);
    }
}
