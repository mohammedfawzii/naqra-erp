<?php

namespace Modules\Employee\Transformers\AttendanceEmployee;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 AttendanceEmployeeResource
 */
class AttendanceEmployeeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'basic_hours' => $this->basic_hours,
            'attendance_device_id' => $this->attendance_device_id,
            'shift_change' => $this->shift_change,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
