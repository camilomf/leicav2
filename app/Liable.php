<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liable extends Model
{
    protected $fillable = ['rut','name','apePat','apeMat'];

    public function liability(){
        return $this->belongsTo(Liability::class);
    }

    // public function studyPlan(){
    //     return $this->hasMany(StudyPlan::class);
    // }
}
