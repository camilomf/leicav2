<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model
{
    protected $fillable = ['name','description'];


    public function inventory(){
        return $this->belongsToMany(Inventory::class,'maintenance_register','inventory_id','maintenance_type_id');
    }
    // public function studyPlan(){
    //     return $this->hasMany(StudyPlan::class);
    // }
}
