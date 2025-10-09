<?php

namespace Modules\Facilities\Transformers\OwnerForeignCompany;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 OwnerForeignCompanyResource
 */
class OwnerForeignCompanyResource extends BaseMetaResource
{
    public function toArray($request): array
    {
        return $this->mergeWithTimestamps([
            'owner_id' => $this->owner->owner_type ?? null,
            'company_name' => $this->company_name,
            'license_number' => $this->license_number,
            'issue_date' => $this->issue_date,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'partnership_percentage' => $this->partnership_percentage,
            'authorized_person' => $this->authorized_person,
            'authorized_email' => $this->authorized_email,
            'authorized_mobile' => $this->authorized_mobile,
            'landline' => $this->landline,
            'website' => $this->website,
            'partnership_type' => $this->partnership_type,
            'note' => $this->note,
             
        ]);
    }
}
