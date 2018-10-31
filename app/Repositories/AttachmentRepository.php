<?php

namespace App\Repositories;


use App\Contracts\Models\FolderedAttachments;
use App\Models\Attachment;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentRepository extends Repository
{
    public function model()
    {
        return Attachment::class;
    }

    public function saveAttachments(Request $request, $model, string $input_type = 'attachments_new')
    {
        foreach ($request->input($input_type, []) as $slide_key => $attachments) {
            foreach ($attachments as $attachment_key => $attachment) {
                $file = $request->file("$input_type.$slide_key.$attachment_key.image");
                $this->saveAttachment($model, $file, $attachment['roles']);
            }
        }
    }

    public function saveAttachment($model, $file, $roles)
    {
        if ($model instanceof FolderedAttachments)
            $directory = $model->getAttachmentDirectory();
        else
            $directory = '';

        $path = Storage::disk('public')->put($directory, $file);
        $attachment =  Attachment::create([
            'post_id' => $model->id,
            'path' => $path,
            'roles' => $roles,
        ]);

        return $attachment;
    }

    public function deleteAttachments(Request $request, $attachments, array $input_types = [])
    {
        $exists_attachments = [];
        foreach ($input_types as $input_type) {
            $exists_attachments += $request->input($input_type, []);
        }

        foreach($attachments->diffKeys($exists_attachments) as $deleting_attachment) {
            $this->deleteAttachment($deleting_attachment);
        };
    }


    public function deleteAttachment(Attachment $attachment)
    {
        self::deleteAttachmentImage($attachment->path);
        $attachment->delete();

    }

    public function deleteAttachmentImage($path)
    {
        Storage::disk('public')->delete($path);
    }

    public function updateOrCreateMainAttachment(Request $request, $attachments, $model)
    {
        foreach ($request->input('main_attachment', []) as $attachment_id => $attachment_data) {
            $file = $request->file('main_attachment.' . $attachment_id . '.file');
            $attachment = $attachments->get($attachment_id);
            $roles = $attachment_data['roles'];

            if ($attachment) {
                $this->updateAttachment($attachment, $file, $roles);
            } else {
                $this->saveAttachment($model, $file, $roles);
            }
        }
    }

    public function updateAttachments(Request $request, $attachments, string $input_type = 'slides')
    {
        foreach ($request->input($input_type, []) as $attachment_id => $attachment_data) {
            $attachment = $attachments->get($attachment_id);
            $titles = $attachment_data['titles'] ?? [];
            $order = $attachment_data['order'] ?? [];

            $this->updateAttachment($attachment, $request->file($attachment_id), $attachment_data['roles'], $titles, $order);
        }
    }

}
