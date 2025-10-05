<?php

namespace Modules\Training\Transformers\ExternalLearningPlatformIntegration;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


class ExternalLearningPlatformIntegrationResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'integration_status' => [
                    [ 'label' => 'Active', 'value' => 'active' ],
                    [ 'label' => 'Failed', 'value' => 'failed' ],
                    [ 'label' => 'Pending', 'value' => 'pending' ]
                ],

        ];
    }
}
