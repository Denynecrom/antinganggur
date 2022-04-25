<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = "languages";

    protected $fillable = [
        'name_lang',
        'level_lang',
        'user_id',
    ];

    public function User()
    {
        return $this->belongTo(User::class);
    }
}
