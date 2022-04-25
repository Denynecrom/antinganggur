<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magangdetail extends Model
{
        public function magang()
	{
	      return $this->belongsTo('App\Magang', 'id');
	}


}
