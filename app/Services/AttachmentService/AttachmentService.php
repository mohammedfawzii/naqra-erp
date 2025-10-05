<?php
namespace App\Services\AttachmentService;

 use Illuminate\Database\Eloquent\Model;

class AttachmentService
{

public function uploadFiles($files, Model $model,$module): array
{

    $files = is_array($files) ? $files : [$files];

    $attachments = [];

    foreach ($files as $file) {
        $path = $file->store($module.'/' . strtolower(class_basename($model)), 'public');

        $attachments[] = $model->attachments()->create([
            'name'      => $file->getClientOriginalName(),
            'file'      => $path,
            'size'      => $file->getSize(),
            'mime_type' => $file->getMimeType(),
        ]);
    }

    return $attachments;
}


}
