<?php

namespace Modules\Facilities\Transformers\DigitalFacility;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Facilities\Models\{
    Branch
};

/**
 * 🔹 DigitalFacilityResourceEnums
 */
class DigitalFacilityResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'branch' => $this->enum(Branch::class, 'facility_id'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
