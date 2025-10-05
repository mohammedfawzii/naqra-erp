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
 use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
 
 {    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

  

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'user_id' =>$this->id,
            'user_name' =>$this->userName,
            'db_name' =>$this->domine ? $this->domine->db_name : null,
        ];
    }
 
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
         'is_verified' => 'boolean',
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
 

     public function domine()
    {
        return $this->hasOne(Tenant::class, 'user_id', 'id');
    }

 }
