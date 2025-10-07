<?php

namespace Modules\Employee\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\City;
use Modules\CmsErp\Models\Country;

// use Modules\Employee\Database\Factories\EmployeeAddressFactory;

class EmployeeAddress extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeAddressFactory
    // {
    //     // return EmployeeAddressFactory::new();
    // }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}