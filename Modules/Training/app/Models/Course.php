<?php

namespace Modules\Training\Models;

use App\Models\BaseModel;
use Spatie\Translatable\HasTranslations;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\TrainingProgramManagementFactory;

class Course extends BaseModel
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TrainingProgramManagementFactory
    // {
    //     // return TrainingProgramManagementFactory::new();
    // }
}
