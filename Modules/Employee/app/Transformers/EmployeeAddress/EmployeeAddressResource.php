<?php

namespace Modules\Employee\Transformers\EmployeeAddress;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeAddressResource
 */
class EmployeeAddressResource extends BaseMetaResource
{
    public function toArray($request): array
    {
                return $this->mergeWithTimestamps([

            'employee_id' => $this->employee_id,
            'type' => $this->type,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'neighborhood' => $this->neighborhood,
            'street' => $this->street,
            'building_number' => $this->building_number,
            'building_type' => $this->building_type,
            'building_name' => $this->building_name,
            'postal_code' => $this->postal_code,
            'po_box' => $this->po_box,
            'notes' => $this->notes,
            'same_address' => $this->same_address,
             
        ]);
    }
}
