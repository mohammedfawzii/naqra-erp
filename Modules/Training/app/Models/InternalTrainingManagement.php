<?php

namespace Modules\Training\Models;


 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\InternalTrainingManagementFactory;

class InternalTrainingManagement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): InternalTrainingManagementFactory
    // {
    //     // return InternalTrainingManagementFactory::new();
    // }


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
