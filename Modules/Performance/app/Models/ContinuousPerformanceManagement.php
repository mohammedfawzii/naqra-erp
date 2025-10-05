<?php

namespace Modules\Performance\Models;

use Modules\CmsErp\Models\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\ContinuousPerformanceManagementFactory;

class ContinuousPerformanceManagement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ContinuousPerformanceManagementFactory
    // {
    //     // return ContinuousPerformanceManagementFactory::new();
    // }


    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

}
