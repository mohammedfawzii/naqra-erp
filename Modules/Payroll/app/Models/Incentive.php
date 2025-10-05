<?php

namespace Modules\Payroll\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Modules\Employee\Models\Employeeinfo;
use Modules\Payroll\Models\IncentiveType;
use Modules\Payroll\Models\IncentiveStatus;
use Modules\Payroll\Models\PayrollAttachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Payroll\Database\Factories\IncentiveFactory;

class Incentive extends BaseModel
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): IncentiveFactory
    // {
    //     // return IncentiveFactory::new();
    // }






    public function incentiveTypes()
    {
        return $this->belongsTo(IncentiveType::class, 'incentive_types_id');
    }



    public function incentiveStatus()
    {
        return $this->belongsTo(IncentiveStatus::class, 'incentive_status_id');
    }





}
