<?php

namespace Modules\Facilities\Transformers\Owner;

use App\Transformers\BaseResource\BaseMetaResource;


class OwnerResource extends BaseMetaResource
{
    public function toArray($request): array
    {
        return $this->mergeWithTimestamps([
            'facility_id' => $this->facility_id,
            'owner_type' => $this->owner_type,

        ]);
    }
}
