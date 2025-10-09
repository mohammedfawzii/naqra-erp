<?php

namespace Modules\Facilities\Transformers\OwnerEndowment;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 OwnerEndowmentResource
 */
class OwnerEndowmentResource extends BaseMetaResource
{
    public function toArray($request): array
    {
return $this->mergeWithTimestamps([
            'owner_id' => $this->owner->owner_type ?? null,
            'endowment_name' => $this->endowment_name,
            'endowment_national_number' => $this->endowment_national_number,
            'approval_date' => $this->approval_date,
            'authorized_person' => $this->authorized_person,
            'authorized_mobile' => $this->authorized_mobile,
            'authorized_email' => $this->authorized_email,
            'address' => $this->address,
            'partnership_type' => $this->partnership_type,
            'partnership_percentage' => $this->partnership_percentage,
            'note' => $this->note,
            
        ]);
    }
}
