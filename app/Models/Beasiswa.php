<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Beasiswa extends Model
{
    use HasFactory;

    // limit text
    // const LIMIT = 50;

    // public function limit()
    // {
    //     return Str::limit($this->description, beasiswa::LIMIT );
    // }

    protected $table = "beasiswa";
    // protected $guarded = [];
    protected $fillable = [
        'title',
        'photo',
        'email',
        'no_hp',
        'jenjang_pendidikan',
        'description',
        'start_at'
    ];
}
