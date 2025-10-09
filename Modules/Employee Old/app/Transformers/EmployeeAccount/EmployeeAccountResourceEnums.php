<?php

namespace Modules\Employee\Transformers\EmployeeAccount;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


/**
 * 🔹 EmployeeAccountResourceEnums
 */
class EmployeeAccountResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'approved' => $this->approveds(),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function approveds(): array
    {
        return [
            ['label' => 'Yes', 'value' => 'yes'],
            ['label' => 'No', 'value' => 'no'],
        ];
    }
}
