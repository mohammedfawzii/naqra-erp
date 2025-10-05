<?php

namespace Modules\Training\Transformers\LicensingAndCertificationManagement;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


class LicensingAndCertificationManagementResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'renewal_status' => [
                    [ 'label' => 'Renewed', 'value' => 'renewed' ],
                    [ 'label' => 'Pending', 'value' => 'pending' ],
                    [ 'label' => 'Expired', 'value' => 'expired' ]
                ],

        ];
    }
}
