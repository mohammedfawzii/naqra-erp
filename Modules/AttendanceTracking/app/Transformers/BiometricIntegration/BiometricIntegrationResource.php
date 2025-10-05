<?php

namespace Modules\AttendanceTracking\Transformers\BiometricIntegration;

use Modules\AttendanceTracking\Transformers\BaseResource\BaseResource;

class BiometricIntegrationResource extends BaseResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return array_merge(
            $this->baseArray(),
            [
            'biometric_type' => $resource->biometric_type,
            'registration_date' => $resource->registration_date,
             ],
            $this->timestampsArray()
        );
    }
}
