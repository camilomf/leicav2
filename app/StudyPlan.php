<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    protected $fillable = ['name','date_start','date_end'];

    public function career(){
        return $this->belongsTo(Career::class);
    }
}
