<?php

namespace Modules\Facilities\Transformers\OwnerGulfCompany;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 OwnerGulfCompanyResource
 */
class OwnerGulfCompanyResource extends BaseMetaResource
{
    public function toArray($request): array
    {
        
        return $this->mergeWithTimestamps([
            'owner_id' => $this->owner->owner_type ?? null,
            'gulf_commercial_number' => $this->gulf_commercial_number,
            'name' => $this->name,
            'company_type' => $this->company_type,
            'company_status' => $this->company_status,
            'company_nationality' => $this->company_nationality,
            'email' => $this->email,
            'landline' => $this->landline,
            'website' => $this->website,
            'authorized_person' => $this->authorized_person,
            'authorized_email' => $this->authorized_email,
            'authorized_mobile' => $this->authorized_mobile,
            'unified_phone' => $this->unified_phone,
            'partnership_type' => $this->partnership_type,
            'partnership_percentage' => $this->partnership_percentage,
            'note' => $this->note,
            
        ]);
    }
}
