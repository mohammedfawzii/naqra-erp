<?php

namespace Modules\Training\Transformers\LicensingAndCertificationManagement;

use App\Transformers\BaseResource\BaseResource;

class LicensingAndCertificationManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'license_name' => $resource->license_name,
            'renewal_date' => $resource->renewal_date,
            'renewal_status' => $resource->renewal_status,
            ],
            $this->timestampsArray()
        );
    }
}
