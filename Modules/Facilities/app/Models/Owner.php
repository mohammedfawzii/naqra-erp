<?php

namespace Modules\Facilities\Models;

use Modules\CmsErp\Models\City;
use Modules\CmsErp\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Modules\CmsErp\Models\jopTitle;
use Modules\CmsErp\Models\OwnershipType;

// use Modules\Facilities\Database\Factories\OwnerFactory;

class owner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OwnerFactory
    // {
    //     // return OwnerFactory::new();
    // }


    public function ownerType()
    {
        return $this->belongsTo(OwnershipType::class, 'owner_type_id');
    }



    public function jobTitle()
    {

        return $this->belongsTo(JopTitle::class, 'job_title_id');
    }



    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }



    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
