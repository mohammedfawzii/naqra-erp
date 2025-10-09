<?php

namespace Modules\Employee\Transformers\PersonalInformationEmployee;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Employee\Models\{
    Nationality,
    Religion
};

/**
 * 🔹 PersonalInformationEmployeeResourceEnums
 */
class PersonalInformationEmployeeResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            // 'nationality' => $this->enum(Nationality::class, 'name'),
            'marital_status' => $this->maritalStatuses(),
            'gender' => $this->genders(),
            // 'religion' => $this->enum(Religion::class, 'name'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function maritalStatuses(): array
    {
        return [
            ['label' => 'Single', 'value' => 'single'],
            ['label' => 'Married', 'value' => 'married'],
            ['label' => 'Divorced', 'value' => 'divorced'],
            ['label' => 'Widowed', 'value' => 'widowed'],
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
