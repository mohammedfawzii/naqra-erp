<?php

namespace Modules\AttendanceTracking\Transformers\BaseResource;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    protected function baseArray(): array
    {
         return [
            'id'       => (string) $this->id,
              'employee' =>  $this->employee ? $this->employee->getTranslation('firstName', app()->getLocale()) : null,
             'attendanceAttachments' => $this->attendanceAttachments?->file,
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
