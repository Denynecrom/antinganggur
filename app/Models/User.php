<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password','address','address','birthdate','photo','role','resume','cv'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function education()
    {
        return $this->hasOne(Education::class, 'user_id');
    }
    public function language()
    {
        return $this->hasOne(Language::class, 'user_id');
    }
    public function skill()
    {
        return $this->hasOne(Skill::class, 'user_id');
    }
    public function vacancy()
    {
        return $this->hasMany(Vacancy::class, 'user_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function magang()
    {
        return $this->hasOne(Magang::class);
    }
}
