<?php

namespace App\Transformers\BaseResource;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    protected function baseArray(): array
    {
        return [
            'id'       => (string) $this->id,
            'employee' => $this->employee ? $this->employee->getTranslation('firstName', app()->getLocale()) : null,

            'attachments' => $this->attachments && $this->attachments->count() > 0
                ? $this->attachments->map(function ($attachment) {
                    return [
                        'id'        => $attachment->id,
                        'name'      => $attachment->name,
                        'size'      => $attachment->size,
                        'url'       => asset('storage/' . $attachment->file),
                        'mime_type' => $attachment->mime_type,
                    ];
                })
                : null,

        ];
    }

    protected function timestampsArray(): array
    {
        return [
            'created_at' => optional($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => optional($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
