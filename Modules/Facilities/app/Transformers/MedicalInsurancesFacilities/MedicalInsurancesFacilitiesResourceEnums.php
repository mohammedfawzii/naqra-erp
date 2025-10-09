<?php

namespace Modules\Facilities\Transformers\MedicalInsurancesFacilities;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\Facilities\Models\{
    MedicalInsuranceCategories
};

/**
 * 🔹 MedicalInsurancesFacilitiesResourceEnums
 */
class MedicalInsurancesFacilitiesResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'medicalInsuranceCategories' => $this->enum(MedicalInsuranceCategories::class, 'category_name'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
