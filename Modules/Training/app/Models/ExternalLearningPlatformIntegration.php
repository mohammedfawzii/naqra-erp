<?php

namespace Modules\Training\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\ExternalLearningPlatformIntegrationFactory;

class ExternalLearningPlatformIntegration extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ExternalLearningPlatformIntegrationFactory
    // {
    //     // return ExternalLearningPlatformIntegrationFactory::new();
    // }
}
