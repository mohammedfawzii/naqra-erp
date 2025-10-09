<?php

namespace Modules\Facilities\Transformers\OwnerResident;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 OwnerResidentResource
 */
class OwnerResidentResource extends BaseMetaResource
{
    public function toArray($request): array
    {
     return $this->mergeWithTimestamps([
            'owner_id' => $this->owner->owner_type ?? null,
            'full_name' => $this->full_name,
            'resident_id' => $this->resident_id,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'national_address' => $this->national_address,
            'investment_license_number' => $this->investment_license_number,
            'birth_date' => $this->birth_date,
            'partnership_type' => $this->partnership_type,
            'partnership_percentage' => $this->partnership_percentage,
            'note' => $this->note,
            
        ]);
    }
}
