<?php

namespace Modules\Facilities\Transformers\OwnerGulf;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 OwnerGulfResource
 */
class OwnerGulfResource extends BaseMetaResource
{
    public function toArray($request): array
    {
     return $this->mergeWithTimestamps([
            'owner_id' => $this->owner->owner_type ?? null,
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'third_name' => $this->third_name,
            'family_name' => $this->family_name,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'occupation' => $this->occupation,
            'national_id' => optional($this->national)->getTranslation('name', app()->getLocale()),
            'residency_number' => $this->residency_number,
            'gulf_national_id' => $this->gulf_national_id,
            'email' => $this->email,
            'saudi_mobile' => $this->saudi_mobile,
            'foreign_mobile' => $this->foreign_mobile,
            'saudi_address' => $this->saudi_address,
            'foreign_address' => $this->foreign_address,
            'partnership_type' => $this->partnership_type,
            'partnership_percentage' => $this->partnership_percentage,
            'note' => $this->note,
          
        ]);
    }
}
