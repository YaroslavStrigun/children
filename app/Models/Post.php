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
       return $this->belongsTo('App\Models\Category');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment', 'post_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'post_id');
    }

    public function getAttachment(string $role)
    {
        return $this->getAttachments($role)->first() ?? new Attachment();
    }

    public function getAttachments(string $role)
    {
        $attachments = collect();

        foreach ($this->attachments as $attachment)
        {
            if (in_array($role, $attachment->roles))
            {
                $attachments->push($attachment);
            }
        }

        return $attachments;
    }



}
