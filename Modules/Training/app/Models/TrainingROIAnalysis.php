<?php

namespace Modules\Training\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\TrainingROIAnalysisFactory;

class TrainingROIAnalysis extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TrainingROIAnalysisFactory
    // {
    //     // return TrainingROIAnalysisFactory::new();
    // }
}
