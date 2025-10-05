<?php

namespace Modules\Performance\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Performance\Database\Factories\EvaluationFactory;

class Evaluation extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EvaluationFactory
    // {
    //     // return EvaluationFactory::new();
    // }
}
