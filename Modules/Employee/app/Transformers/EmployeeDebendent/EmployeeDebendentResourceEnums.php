<?php

namespace Modules\Employee\Transformers\EmployeeDebendent;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\CmsErp\Models\Nationality as ModelsNationality;
use Modules\Employee\Models\{
    Employee,
    Nationality
};

/**
 * 🔹 EmployeeDebendentResourceEnums
 */
class EmployeeDebendentResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'relationship' => $this->relationships(),
            'nationality' => $this->enum(ModelsNationality::class, 'name'),
            'gender' => $this->genders(),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function relationships(): array
    {
        return [
            ['label' => 'Son', 'value' => 'son'],
            ['label' => 'Daughter', 'value' => 'daughter'],
            ['label' => 'Wife', 'value' => 'wife'],
            ['label' => 'Husband', 'value' => 'husband'],
            ['label' => 'Father', 'value' => 'father'],
            ['label' => 'Mother', 'value' => 'mother'],
            ['label' => 'Brother', 'value' => 'brother'],
            ['label' => 'Sister', 'value' => 'sister'],
        ];
    }

    protected function genders(): array
    {
        return [
            ['label' => 'Male', 'value' => 'male'],
            ['label' => 'Female', 'value' => 'female'],
        ];
    }
}
