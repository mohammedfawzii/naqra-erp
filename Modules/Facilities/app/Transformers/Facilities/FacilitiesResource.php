<?php

namespace Modules\Facilities\Transformers\Facilities;
use App\Transformers\BaseResource\BaseMetaResource;
class FacilitiesResource extends BaseMetaResource
{
    public function toArray($request): array
    {
      
        return $this->mergeWithTimestamps([
            'name'                  => $this->name,
            'have_branches'         => (bool) $this->have_branches,
            'employee_count'        => (int) $this->employee_count,
            'national_number_alone' => (bool) $this->national_number_alone,
            'status'                => $this->status,
            'activity'              => $this->activity,
            'completion_percentage' => (float) $this->completion_percentage,
        ]);
    
    }
}
