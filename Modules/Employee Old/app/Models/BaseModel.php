<?php

namespace Modules\Employee\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Spatie\Translatable\HasTranslations;

class BaseModel extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

   public function attachments()
    {
        return $this->morphMany(EmployeeAttachment::class, 'attachable');
    }
}
