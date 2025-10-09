<?php

namespace Modules\Employee\Transformers\EmployeeContact;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Employee
};

/**
 * 🔹 EmployeeContactResourceEnums
 */
class EmployeeContactResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'relation' => $this->relations(),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function relations(): array
    {
        return [
            ['label' => 'Father', 'value' => 'father'],
            ['label' => 'Mother', 'value' => 'mother'],
            ['label' => 'Son', 'value' => 'son'],
            ['label' => 'Daughter', 'value' => 'daughter'],
            ['label' => 'Brother', 'value' => 'brother'],
            ['label' => 'Sister', 'value' => 'sister'],
            ['label' => 'Wife', 'value' => 'wife'],
            ['label' => 'Husband', 'value' => 'husband'],
            ['label' => 'Friend', 'value' => 'friend'],
        ];
    }
}
