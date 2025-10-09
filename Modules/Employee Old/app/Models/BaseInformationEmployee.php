<?php

namespace Modules\Employee\Models;


  use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Department;
use Modules\CmsErp\Models\NoticePeriod;
use Modules\CmsErp\Models\TrialPeriod;

// use Modules\Employee\Database\Factories\BaseInformationEmployeeFactory;

class BaseInformationEmployee extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    // protected static function newFactory(): BaseInformationEmployeeFactory
    // {
    //     // return BaseInformationEmployeeFactory::new();
    // }

 

    

     



    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }



    public function noticePeriod()
    {
        return $this->belongsTo(NoticePeriod::class, 'notice_period_id');
    }



    public function trialPeriod()
    {
        return $this->belongsTo(TrialPeriod::class, 'trial_period_id');
    }







    // public function company()
    // {
    //     return $this->belongsTo(Company::class, 'company_id');
    // }



    // public function branch()
    // {
    //     return $this->belongsTo(Branch::class, 'branch_id');
    // }



    // public function position()
    // {
    //     return $this->belongsTo(Position::class, 'position_id');
    // }



    // public function directManager()
    // {
    //     return $this->belongsTo(DirectManager::class, 'direct_manager_id');
    // }



    // public function holidayManager()
    // {
    //     return $this->belongsTo(HolidayManager::class, 'holiday_manager_id');
    // }



    // public function salaryManager()
    // {
    //     return $this->belongsTo(SalaryManager::class, 'salary_manager_id');
    // }

}