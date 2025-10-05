<?php

namespace Modules\Facilities\Models;


use Modules\CmsErp\Models\CompanySize;
use Modules\CmsErp\Models\CompanyType;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Modules\CmsErp\Models\CompanyActivity;
use Modules\CmsErp\Models\CompanyHeadquarter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\FacilitiesFactory;

class Facilities extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['key', 'label'];







    public function companyType()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }



    public function companySize()
    {
        return $this->belongsTo(CompanySize::class, 'company_size_id');
    }



    public function companyHeadquarters()
    {
        return $this->belongsTo(CompanyHeadquarter::class, 'company_headquarters_id');
    }



    public function companyActivities()
    {
        return $this->belongsTo(CompanyActivity::class, 'company_activities_id');
    }

}
