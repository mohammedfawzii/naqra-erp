<?php

namespace Modules\Facilities\Transformers\Branch;

use App\Transformers\BaseResource\BaseMetaResource;
 
class BranchResource extends BaseMetaResource
{
    public function toArray($request): array
    {
        return $this->mergeWithTimestamps([
            'facility_id' => $this->facility_id,
            'avatar' => $this->avatar,
            'unified_national_number' => $this->unified_national_number,
            'name' => $this->name,
            'entity_id' => $this->entity_id,
            'company_type_id' => $this->company_type_id,
            'company_size_id' => $this->company_size_id,
            'city_id' => $this->city_id,
            'headquarter_id' => $this->headquarter_id,
            'activity_id' => $this->activity_id,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'website' => $this->website,
            
         
        ]);
    }
}
