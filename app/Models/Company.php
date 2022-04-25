<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'businessfield_id',
        'province_id',
        'address',
        'description',
        'password',
        'photo',
        'website',
        'facebook',
        'instagram',
    ];

    public function has_complete_data()
    {
        return $this->phone && $this->address && $this->photo && $this->businessfield_id && $this->province_id;
    }

    public function advertisement()
    {
		return $this->hasMany(Advertisement::class, 'company_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function businessfield()
    {
        return $this->belongsTo(BusinessField::class);
    }
}
