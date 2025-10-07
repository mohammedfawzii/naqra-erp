<?php

namespace Modules\Employee\Transformers\EmployeeAddress;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Employee,
    Country,
    City
};

/**
 * 🔹 EmployeeAddressResourceEnums
 */
class EmployeeAddressResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'type' => $this->types(),
           
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function types(): array
    {
        return [
            ['label' => 'Current', 'value' => 'current'],
            ['label' => 'Permanent', 'value' => 'permanent'],
        ];
    }
}
