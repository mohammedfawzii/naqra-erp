<?php

namespace Modules\Training\Transformers\CertificationManagement;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


class CertificationManagementResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'certification_status' => [
                    [ 'label' => 'Valid', 'value' => 'valid' ],
                    [ 'label' => 'Expired', 'value' => 'expired' ],
                    [ 'label' => 'Pending', 'value' => 'pending' ]
                ],

        ];
    }
}
