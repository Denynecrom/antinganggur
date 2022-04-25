<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Province extends Model
{
    use HasFactory;

    protected $table = "provinces";

    public function user()
    {
		return $this->hasMany(User::class);
    }
    public function company()
    {
		return $this->hasMany(Company::class);
    }
}
