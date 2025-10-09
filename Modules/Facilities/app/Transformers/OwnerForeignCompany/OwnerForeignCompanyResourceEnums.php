<?php

namespace Modules\Facilities\Transformers\OwnerForeignCompany;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Facilities\Models\{
    Owner
};

/**
 * 🔹 OwnerForeignCompanyResourceEnums
 */
class OwnerForeignCompanyResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'owner' => $this->enum(Owner::class, 'owner_type'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
