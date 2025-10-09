<?php

namespace Modules\Employee\Transformers\EmployeeHoliday;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Employee,
    HolidayList
};

/**
 * 🔹 EmployeeHolidayResourceEnums
 */
class EmployeeHolidayResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'holidayList' => $this->enum(HolidayList::class, 'holiday_name'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
