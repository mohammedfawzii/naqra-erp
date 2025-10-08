<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Models\EmployeeAttachment;
  use Spatie\Translatable\HasTranslations;

// use Modules\Facilities\Database\Factories\BaseModelFactory;

class BaseModel extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];



    /**
     * The attributes that are mass assignable.
     */
 
   public function attachments()
    {
        return $this->morphMany(EmployeeAttachment::class, 'attachable');
    }
}
