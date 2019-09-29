<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = ['name','description'];

    public function studyPlan(){
        return $this->hasMany(StudyPlan::class);
    }
}
