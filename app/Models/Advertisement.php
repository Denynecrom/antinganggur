<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = "advertisements";

    protected $fillable = ['position', 'classification', 'work_experience', 'education','workdescription', 'qualification', 'salary', 'needed', 'start_at', 'end_at', 'show', 'deleted_at', 'company_id'];

    protected $appends = ['show_label'];

    public function getShowLabelAttribute()
    {
    	if ($this->show == 0) {
    		return '<span>Tidak</span>';
    	}
    	return '<span>Ya</span>';
    }


    public function company()
    {
		return $this->belongsTo(Company::class);
    }
    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }
}
