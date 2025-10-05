<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\CmsErp\Models\Language;
use Modules\CmsErp\Models\Nationality;
use Modules\CmsErp\Models\SecurityQuestions;
use Modules\Facilities\Models\InfoFacilities;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getTermsAcceptedAttribute($value)
    {
        return (bool) $value;
    }

    // User columns 
    public function columns()
    {
        return $this->hasMany(InfoFacilities::class, 'infoable_type', 'User');
    }

    // User nationality 
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    // User language 
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    // User securityQuestion 
    public function securityQuestion()
    {
        return $this->belongsTo(SecurityQuestions::class, 'securityQuestion_id');
    }
}
