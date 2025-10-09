<?php

namespace Modules\Facilities\Transformers\OwnerAssociation;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 OwnerAssociationResource
 */
class OwnerAssociationResource extends BaseMetaResource
{
    public function toArray($request): array
    {
        return $this->mergeWithTimestamps([
            'owner_id' => $this->owner->owner_type ?? null,
            'association_name' => $this->association_name,
            'license_number' => $this->license_number,
            'establishment_date' => $this->establishment_date,
            'license_expiry_date' => $this->license_expiry_date,
            'email' => $this->email,
            'national_address' => $this->national_address,
            'authorized_person' => $this->authorized_person,
            'authorized_email' => $this->authorized_email,
            'authorized_mobile' => $this->authorized_mobile,
            'landline' => $this->landline,
            'website' => $this->website,
            'partnership_percentage' => $this->partnership_percentage,
            'partnership_type' => $this->partnership_type,
            'note' => $this->note,
          
        ]);
    }
}
