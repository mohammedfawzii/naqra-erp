<?php

namespace Modules\Training\Transformers\CertificationManagement;

use App\Transformers\BaseResource\BaseResource;

class CertificationManagementResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'certification_name' => $resource->certification_name,
            'issue_date' => $resource->issue_date,
            'expiration_date' => $resource->expiration_date,
            'certification_status' => $resource->certification_status,
            ],
            $this->timestampsArray()
        );
    }
}
