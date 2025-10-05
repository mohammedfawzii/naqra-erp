<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Recruitment\Models\JobVacancie;
use Spatie\Translatable\HasTranslations;

// use Modules\CmsErp\Database\Factories\DepartmentFactory;

class Department extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];

    public function Vacancies()
    {
        return $this->hasMany(JobVacancie::class, 'department');
    }

}
