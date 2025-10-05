<?php

namespace Modules\Benefit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Benefit\Database\Factories\AiDrivenBenefitsRecommendationFactory;

class AiDrivenBenefitsRecommendation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AiDrivenBenefitsRecommendationFactory
    // {
    //     // return AiDrivenBenefitsRecommendationFactory::new();
    // }
}
