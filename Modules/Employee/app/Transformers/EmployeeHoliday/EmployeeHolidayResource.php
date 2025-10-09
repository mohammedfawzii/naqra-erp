<?php

namespace Modules\Employee\Transformers\EmployeeHoliday;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeHolidayResource
 */
class EmployeeHolidayResource extends BaseMetaResource
{
    public function toArray($request): array
    {
            return $this->mergeWithTimestamps([
            'employee_id' => $this->employee_id,
            'total_balance' => $this->total_balance,
            'remaining_balance' => $this->remaining_balance,
            'holiday_list_id' => $this->holiday_list_id,
            'status' => $this->status,
            'list' => $this->list,
            
        ]);
    }
}
