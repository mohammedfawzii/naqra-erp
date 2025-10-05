<?php

namespace Modules\Training\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Training\Database\Factories\ELearningManagementFactory;

class ELearningManagement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ELearningManagementFactory
    // {
    //     // return ELearningManagementFactory::new();
    // }
}
