<?php

namespace App\Models;

use App\Contracts\Models\FolderedAttachments;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\FolderedAttachments as FolderedAttachmentsTrait;

class Page extends Model implements FolderedAttachments
{
    use FolderedAttachmentsTrait;

    const ATTACHMENT_DIRECTORY = 'posts';

    protected $fillable = [
      'slug', 'name', 'text'
    ];
}
