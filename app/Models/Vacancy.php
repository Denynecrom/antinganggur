<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = "vacancies";

    protected $fillable = [
        'user_id',
        'company_id',
        'advertisement_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
    public function magang()
    {
        return $this->belongsTo(Magang::class);
    }
}
