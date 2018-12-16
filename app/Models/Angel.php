<?php

namespace App;

use App\Contracts\Models\FolderedAttachments;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\FolderedAttachments as FolderedAttachmentsTrait;

class Angel extends Model implements FolderedAttachments
{
    use FolderedAttachmentsTrait;

    const ATTACHMENT_DIRECTORY = 'angels';
}
