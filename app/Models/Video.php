<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'link',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Model\Post');
    }

    public function getIframeLinkAttribute()
    {
        return str_replace('watch?v=','embed/' , $this->link);
    }

    public function getImageLinkAttribute()
    {
        return 'https://img.youtube.com/vi/' . array_pop(explode('=', $this->link)) . '/0.jpg';
    }
}
