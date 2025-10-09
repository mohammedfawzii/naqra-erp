<?php

declare(strict_types=1);

namespace App\Services\AttachmentService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Log;

class AttachmentService
{
    public function __construct(
        protected string $disk = 'public'
    ) {}

    /**
      *
     * @param array|UploadedFile $files
     * @param Model $model
     * @param string $module
     * @return array
     * @throws Exception
     */
public function uploadFiles(array|UploadedFile|null $files, Model $model, string $module): array
{
     if (empty($files)) {
        return [];
    }
     $files = is_array($files) ? $files : [$files];
    $attachments = [];

    if (!method_exists($model, 'attachments')) {
        throw new Exception(sprintf(
            "Model [%s] must define an 'attachments()' relationship.",
            get_class($model)
        ));
    }

    foreach ($files as $file) {
        if (!$file instanceof UploadedFile) {
            continue; 
        }

        $folder = "{$this->safeModuleName($module)}/" . strtolower(class_basename($model));

        try {
            $path = $file->store($folder, $this->disk);

            $attachment = $model->attachments()->create([
                'name'      => $file->getClientOriginalName(),
                'file'      => $path,
                'size'      => $file->getSize(),
                'mime_type' => $file->getMimeType(),
            ]);

            $attachments[] = $this->formatAttachment($attachment, $path);
        } catch (Exception $e) {
            report($e);  
        }
    }

    return $attachments;
}


  
    public function deleteAttachments(array $attachments): void
    {
        foreach ($attachments as $attachment) {
            try {
                Storage::disk($this->disk)->delete($attachment->file);
                $attachment->delete();
            } catch (Exception $e) {
                report($e);
            }
        }
    }
 
    public function updateFiles(array $newFiles, Model $model, string $module): array
    {
        $oldAttachments = $model->attachments ?? [];
        $this->deleteAttachments($oldAttachments);

        return $this->uploadFiles($newFiles, $model, $module);
    }

    
    protected function formatAttachment($attachment, string $path): array
    {
        return [
            'id'        => $attachment->id,
            'name'      => $attachment->name,
            'url'       => Storage::disk($this->disk)->url($path),
            'size'      => $attachment->size,
            'mime_type' => $attachment->mime_type,
        ];
    }
 
    protected function safeModuleName(string $module): string
    {
        return Str::slug($module);
    }
}
