<?php

namespace Modules\Training\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\TrainingNeedsAssessmentFactory;

class TrainingNeedsAssessment extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TrainingNeedsAssessmentFactory
    // {
    //     // return TrainingNeedsAssessmentFactory::new();
    // }
}
