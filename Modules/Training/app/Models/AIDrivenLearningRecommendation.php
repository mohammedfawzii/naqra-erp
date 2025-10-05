<?php

namespace Modules\Training\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\AIDrivenLearningRecommendationFactory;

class AIDrivenLearningRecommendation extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AIDrivenLearningRecommendationFactory
    // {
    //     // return AIDrivenLearningRecommendationFactory::new();
    // }
}
