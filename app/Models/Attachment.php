<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'path',
        'attachable_type',
        'attachable_id',
        'roles'
    ];

    public function post()
    {
        return $this->morphTo();
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
