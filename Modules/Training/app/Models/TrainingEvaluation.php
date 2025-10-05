<?php

namespace Modules\Training\Models;

use Modules\Training\Models\Course;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\TrainingEvaluationFactory;

class TrainingEvaluation extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TrainingEvaluationFactory
    // {
    //     // return TrainingEvaluationFactory::new();
    // }


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
