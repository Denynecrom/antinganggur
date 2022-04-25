<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = "educations";

    public function User()
    {
        return $this->belongTo(User::class);
    }

    protected $fillable = [
        'institution',
        'level_edu',
        'major',
        'graduated_date',
        'user_id',
    ];
}
