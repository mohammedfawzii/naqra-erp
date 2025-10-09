<?php

namespace Modules\Employee\Transformers\AttendanceEmployee;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 AttendanceEmployeeResource
 */
class AttendanceEmployeeResource extends BaseMetaResource
{
    public function toArray($request): array
    {
                    return $this->mergeWithTimestamps([

            'basic_hours' => $this->basic_hours,
            'attendance_device_id' => $this->attendance_device_id,
            'shift_change' => $this->shift_change,
           
        ]);
    }
}
