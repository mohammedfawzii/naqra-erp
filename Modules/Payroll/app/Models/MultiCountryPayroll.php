<?php

namespace Modules\Payroll\Models;

use App\Models\BaseModel;
use Modules\CmsErp\Models\Country;
use Modules\CmsErp\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\MultiCountryPayrollFactory;

class MultiCountryPayroll extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): MultiCountryPayrollFactory
    // {
    //     // return MultiCountryPayrollFactory::new();
    // }


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }



    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

}
