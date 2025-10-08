<?php

namespace Modules\Facilities\Transformers\Facilities;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


/**
 * 🔹 FacilitiesResourceEnums
 */
class FacilitiesResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'status' => $this->statuses(),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function statuses(): array
    {
        return [
            ['label' => 'Active', 'value' => 'active'],
            ['label' => 'Not active', 'value' => 'not_active'],
        ];
    }
}
