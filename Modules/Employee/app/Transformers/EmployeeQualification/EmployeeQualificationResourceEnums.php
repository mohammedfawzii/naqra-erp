<?php

namespace Modules\Employee\Transformers\EmployeeQualification;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Country,
    City
};

/**
 * 🔹 EmployeeQualificationResourceEnums
 */
class EmployeeQualificationResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
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
