<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'description'
    ];

    public function category()
    {
       return $this->belongsTo('App\Model\Category');
    }

    public function attachments()
    {
        return $this->hasMany('App\Model\Attachment', 'post_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Model\Video', 'post_id');
    }

}
