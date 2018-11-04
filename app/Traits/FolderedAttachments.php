<?php

namespace App\Traits\Model;


use App\Models\Attachment;

trait FolderedAttachments
{
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachable');
    }

    public function getAttachmentDirectory()
    {
        return self::ATTACHMENT_DIRECTORY . '/' . $this->id;
    }

    public function getAttachments(string $role, bool $strict = true, bool $group = false)
    {
        $attachments = collect();

        foreach ($this->attachments as $attachment) {
            $condition = $strict ? in_array($role, $attachment->roles) : strpos($attachment->getOriginal('roles'), $role) !== false;

            if ($condition) {
                if (!$strict && $group) {
                    $group_by_roles = collect($attachment->roles)->filter(function ($item) use ($role){
                        return strpos($item, $role) === 0;
                    });

                    foreach ($group_by_roles as $group_by_role) {
                        $group = $attachments->get($group_by_role, collect());

                        $group->push($attachment);

                        $attachments->put($group_by_role, $group);
                    }
                } else {
                    $attachments->push($attachment);
                }
            }
        }

        return $attachments;
    }

    public function getAttachment(string $role)
    {
        return $this->getAttachments($role)->first() ?? new Attachment();
    }
}
