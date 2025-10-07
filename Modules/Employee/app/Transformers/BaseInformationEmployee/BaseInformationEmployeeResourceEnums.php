<?php

namespace Modules\Employee\Transformers\BaseInformationEmployee;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\CmsErp\Models\Department;
use Modules\CmsErp\Models\NoticePeriod;
use Modules\CmsErp\Models\TrialPeriod;
use Modules\Employee\Models\{
    Employee,
    
      
};

/**
 * 🔹 BaseInformationEmployeeResourceEnums
  */
class BaseInformationEmployeeResourceEnums extends JsonResource
{
    /**
      */
    public function toArray($request): array
    {
        return [
            'employee' => $this->enum(Employee::class, 'branch_id'),
            'department' => $this->enum(Department::class, 'name'),
            'noticePeriod' => $this->enum(NoticePeriod::class, 'period_name'),
            'trialPeriod' => $this->enum(TrialPeriod::class, 'period_long'),
            'status' => $this->statuses(),
        ];
    }


    /**
      */
    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function statuses(): array
    {
        return [
            ['label' => 'Hire', 'value' => 'hire'],
            ['label' => 'Fire', 'value' => 'fire'],
            ['label' => 'Retirement', 'value' => 'retirement'],
            ['label' => 'Contract end', 'value' => 'contract_end'],
        ];
    }
}
