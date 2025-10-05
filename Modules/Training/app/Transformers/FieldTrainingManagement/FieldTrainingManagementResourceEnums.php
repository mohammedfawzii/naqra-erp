<?php

namespace Modules\Training\Transformers\FieldTrainingManagement;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


class FieldTrainingManagementResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'status' => [
                    [ 'label' => 'Planned', 'value' => 'planned' ],
                    [ 'label' => 'In progress', 'value' => 'in_progress' ],
                    [ 'label' => 'Completed', 'value' => 'completed' ]
                ],

        ];
    }
}
