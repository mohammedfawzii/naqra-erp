<?php

namespace Modules\Facilities\Transformers\PeriodicObligations;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Facilities\Models\{
    Facilities,
    Facility
};

/**
 * 🔹 PeriodicObligationsResourceEnums
 */
class PeriodicObligationsResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'facility' => $this->enum(Facilities::class, 'name'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
