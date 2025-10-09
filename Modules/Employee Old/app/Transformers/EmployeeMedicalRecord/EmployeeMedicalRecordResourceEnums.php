<?php

namespace Modules\Employee\Transformers\EmployeeMedicalRecord;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Employee,
    MedicalInsuranceCategory
};

/**
 * 🔹 EmployeeMedicalRecordResourceEnums
 */
class EmployeeMedicalRecordResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'medicalInsuranceCategory' => $this->enum(MedicalInsuranceCategory::class, 'category_name'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
