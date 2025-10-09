<?php

namespace Modules\Facilities\Transformers\Branch;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\CmsErp\Models\Activity as ModelsActivity;
use Modules\CmsErp\Models\City as ModelsCity;
use Modules\CmsErp\Models\CompanySize as ModelsCompanySize;
use Modules\CmsErp\Models\CompanyType as ModelsCompanyType;
use Modules\CmsErp\Models\Entity as ModelsEntity;
use Modules\CmsErp\Models\Headquarter as ModelsHeadquarter;
use Modules\Facilities\Models\{
    Facility,
    Entity,
    CompanyType,
    CompanySize,
    City,
    Headquarter,
    Activity,
    Facilities
};

/**
 * 🔹 BranchResourceEnums
 */
class BranchResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [
            // 'facility' => $this->enum(Facilities::class, 'name'),
            'entity' => $this->enum(ModelsEntity::class, 'type'),
            'companyType' => $this->enum(ModelsCompanyType::class, 'company_type'),
            'companySize' => $this->enum(ModelsCompanySize::class, 'type'),
            'city' => $this->enum(ModelsCity::class, 'name'),
            'headquarter' => $this->enum(ModelsHeadquarter::class, 'headquarters'),
            'activity' => $this->enum(ModelsActivity::class, 'activity'),
        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
