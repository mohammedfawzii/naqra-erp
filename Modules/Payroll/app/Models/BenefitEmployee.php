<?php

namespace Modules\Payroll\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Modules\Payroll\Models\BenefitType;
use Modules\Employee\Models\Employeeinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\BenefitEmployeeFactory;

class BenefitEmployee extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];








    public function benefitTypes()
    {
        return $this->belongsTo(BenefitType::class, 'benefit_types_id');
    }





}
