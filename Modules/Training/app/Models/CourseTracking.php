<?php

namespace Modules\Training\Models;

use Modules\Training\Models\BaseModel;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseTracking extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CourseTrackingFactory
    // {
    //     // return CourseTrackingFactory::new();
    // }


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
