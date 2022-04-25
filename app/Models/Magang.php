<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Magang extends Model
{
    protected $table = "magangs";
    protected $fillable = ['name','pendidikan','keahlian','gaji','email','no_hp', 'photo', 'description', ];

    public function magang_detail()
    {
          return $this->belongsTo('App\Magangdetail', 'id');
    }


}
