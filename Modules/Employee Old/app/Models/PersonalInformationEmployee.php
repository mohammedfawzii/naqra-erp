<?php

namespace Modules\Employee\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Nationality;
 use Spatie\Translatable\HasTranslations;

// use Modules\Employee\Database\Factories\PersonalInformationEmployeeFactory;

class PersonalInformationEmployee extends BaseModel
{
    use HasFactory,HasTranslations;

 
    protected $fillable = [];
    public $translatable = ['first_name', 'second_name','therd_name','family_name'];
 
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }


    // public function religion()
    // {
    //     return $this->belongsTo(Religion::class, 'religion_id');
    // }

}