<?php

namespace Modules\Facilities\Transformers\OwnerGulf;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\CmsErp\Models\Nationality;
use Modules\Facilities\Models\{
    Owner,
     
};

/**
 * 🔹 OwnerGulfResourceEnums
 */
class OwnerGulfResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'owner' => $this->enum(Owner::class, 'owner_type'),
            'gender' => $this->genders(),
            'nationality' => $this->enum(Nationality::class, 'name'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


    protected function genders(): array
    {
        return [
            ['label' => 'Male', 'value' => 'male'],
            ['label' => 'Female', 'value' => 'female'],
        ];
    }
}
