<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Activity;
use Modules\CmsErp\Models\City;
use Modules\CmsErp\Models\CompanySize;
use Modules\CmsErp\Models\CompanyType;
use Modules\CmsErp\Models\Entity;
use Modules\CmsErp\Models\Headquarter;

class Branch extends BaseModel
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [];

    public array $translatable = ['name'];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function companySize()
    {
        return $this->belongsTo(CompanySize::class, 'company_size_id');
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }

    public function facility()
    {
        return $this->belongsTo(Facilities::class, 'facility_id');
    }

    public function headquarter()
    {
        return $this->belongsTo(Headquarter::class, 'headquarter_id');
    }
}
