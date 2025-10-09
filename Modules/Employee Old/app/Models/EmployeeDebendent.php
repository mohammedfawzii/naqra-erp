<?php

namespace Modules\Employee\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Nationality;
 use Spatie\Translatable\HasTranslations;

// use Modules\Employee\Database\Factories\EmployeeDebendentFactory;

class EmployeeDebendent extends BaseModel
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['full_name'];

   

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

}