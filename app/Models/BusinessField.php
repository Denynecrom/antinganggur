<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BusinessField extends Model
{
    use HasFactory;

    protected $table = "businessfields";

    public function company()
    {
		return $this->hasMany(Company::class);
    }
}
