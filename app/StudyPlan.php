<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    protected $fillable = ['name','date_start','date_end'];

    public function career(){
        return $this->belongsTo(Career::class);
    }

    public function software(){
        return $this->belongsToMany(Software::class,'software_plan_study','software_id','plan_study_id');
    }
}
