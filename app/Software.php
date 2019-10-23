<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = ['name','version','description','observation'];
    
    public function softwareType(){
        return $this->belongsTo(SoftwareType::class);
    }

    public function studyPlan(){
        return $this->belongsToMany(StudyPlan::class,'software_plan_study','plan_study_id','software_id');
    }

    public function place(){
        return $this->belongsToMany(Place::class,'software_by_place','place_id','software_id');
    }
}
