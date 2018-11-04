<?php

namespace App\Models;

use App\Contracts\Models\FolderedAttachments;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\FolderedAttachments as FolderedAttachmentsTrait;

class Post extends Model implements FolderedAttachments
{
    use FolderedAttachmentsTrait;

    const ATTACHMENT_DIRECTORY = 'posts';

    protected $fillable = [
        'title',
        'short_description',
        'description'
    ];

    public function category()
    {
       return $this->belongsTo('App\Models\Category');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'post_id');
    }
}
