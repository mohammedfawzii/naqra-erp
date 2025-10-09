<?php

namespace Modules\Employee\Transformers\EmployeeCourse;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Employee,
    Country,
    City
};

/**
 * 🔹 EmployeeCourseResourceEnums
 */
class EmployeeCourseResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'country' => $this->enum(Country::class, 'name'),
            'city' => $this->enum(City::class, 'country_id'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
