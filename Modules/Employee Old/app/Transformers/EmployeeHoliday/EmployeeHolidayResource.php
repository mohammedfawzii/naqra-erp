<?php

namespace Modules\Employee\Transformers\EmployeeHoliday;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeHolidayResource
 */
class EmployeeHolidayResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'total_balance' => $this->total_balance,
            'remaining_balance' => $this->remaining_balance,
            'holiday_list_id' => $this->holiday_list_id,
            'status' => $this->status,
            'list' => $this->list,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
