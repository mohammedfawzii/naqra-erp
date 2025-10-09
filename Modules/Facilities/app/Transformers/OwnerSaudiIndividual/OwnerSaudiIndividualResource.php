<?php

namespace Modules\Facilities\Transformers\OwnerSaudiIndividual;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 OwnerSaudiIndividualResource
 */
class OwnerSaudiIndividualResource extends BaseMetaResource
{
    public function toArray($request): array
    {
        return $this->mergeWithTimestamps([
            'owner_id' => $this->owner->owner_type ??null,
            'name' => $this->name,
            'national_id' => optional($this->national)->getTranslation('name', app()->getLocale()),
            'email' => $this->email,
            'mobile' => $this->mobile,
            'national_address' => $this->national_address,
            'birth_date' => $this->birth_date,
            'occupation' => $this->occupation,
            'partnership_percentage' => $this->partnership_percentage,
            'partnership_type' => $this->partnership_type,
            'note' => $this->note,
            
        ]);
    }
}
