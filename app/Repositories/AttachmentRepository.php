<?php

namespace App\Repositories;


use App\Contracts\Models\FolderedAttachments;
use App\Models\Attachment;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Database\Eloquent\Relations\Relation;
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
                $text = $attachment['text'] ?? '';
                $file = $request->file("$input_type.$slide_key.$attachment_key.image");
                $this->saveAttachment($model, $file, $attachment['roles'], $text);
            }
        }
    }

    public function saveAttachment($model, $file, $roles, $text)
    {
        if ($model instanceof FolderedAttachments)
            $directory = $model->getAttachmentDirectory();
        else
            $directory = '';

        $path = Storage::disk('public')->put($directory, $file);
        $attachment =  Attachment::create([
            'attachable_id' => is_null($model) ? $model : $model->id,
            'attachable_type' => is_null($model) ? $model : array_search(get_class($model), Relation::morphMap()),
            'path' => $path,
            'roles' => $roles,
            'text' => $text
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
            $text = $attachment_data['text'] ?? '';

            if ($attachment) {
                $this->updateAttachment($attachment, $file, $roles, $text);
            } else {
                $this->saveAttachment($model, $file, $roles, $text);
            }
        }
    }

    public function updateAttachments(Request $request, $attachments, string $input_type = 'attachments')
    {
        foreach ($request->input($input_type, []) as $attachment_id => $attachment_data) {
            $attachment = $attachments->get($attachment_id);
            $text = $attachment_data['text'] ?? '';

            $this->updateAttachment($attachment, $request->file($attachment_id), $attachment_data['roles'], $text);
        }
    }

    public function updateAttachment( Attachment $attachment, $file = null, array $roles = [], $text)
    {
        $model = $attachment->attachable;
        $old_path = $path = $attachment->path;

        if ($model instanceof FolderedAttachments)
            $directory = $model->getAttachmentDirectory();
        else
            $directory = '';

        if (!is_null($file)) {
            $path = Storage::disk('public')->put($directory, $file);
        }

        $attachment->update([
            'roles' => $roles,
            'path' => $path,
            'text' => $text
        ]);

        if ($path != $old_path) {
            self::deleteAttachmentImage($old_path);
        }

    }

}
