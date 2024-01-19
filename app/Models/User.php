<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * The usage of protected makes it so the fillables cant be manually 
     * changed by sql injection or using other methods (inspect element etc.).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userRole',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**  
     * We define relationships between the tables in this file. 
     * A user has one profile and a user can have many results (races).
     */

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function result()
    {
        return $this->hasmany(Result::class);
    }
}
