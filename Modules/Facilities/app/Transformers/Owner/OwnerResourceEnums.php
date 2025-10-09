<?php

namespace Modules\Facilities\Transformers\Owner;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Facilities\Models\{
    Facility
};

/**
 * 🔹 OwnerResourceEnums
 */
class OwnerResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
             'owner_type' => $this->ownerTypes(),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function ownerTypes(): array
    {
        return [
            ['label' => 'Association', 'value' => 'association'],
            ['label' => 'Foreign company', 'value' => 'foreign_company'],
            ['label' => 'Saudi individual', 'value' => 'saudi_individual'],
            ['label' => 'Gulf individual', 'value' => 'gulf_individual'],
            ['label' => 'Resident individual', 'value' => 'resident_individual'],
            ['label' => 'Saudi company', 'value' => 'saudi_company'],
            ['label' => 'Gulf company', 'value' => 'gulf_company'],
            ['label' => 'Endowment', 'value' => 'endowment'],
        ];
    }
}
