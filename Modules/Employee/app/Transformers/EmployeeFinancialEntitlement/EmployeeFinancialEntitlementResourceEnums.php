<?php

namespace Modules\Employee\Transformers\EmployeeFinancialEntitlement;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Employee,
    SalaryType,
    Currency,
    Bank
};

/**
 * 🔹 EmployeeFinancialEntitlementResourceEnums
 */
class EmployeeFinancialEntitlementResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'salaryType' => $this->enum(SalaryType::class, 'salary_type'),
            'currency' => $this->enum(Currency::class, 'currency_type'),
            'bank' => $this->enum(Bank::class, 'name'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
