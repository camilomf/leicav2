<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liable extends Model
{
    protected $fillable = ['rut','name','apePat','apeMat'];

    public function liability(){
        return $this->belongsTo(Liability::class);
    }

    public function liableByInventory(){
        return $this->belongsToMany(Inventory::class,'lending_register','inventory_id','liable_id');
    }
    // public function studyPlan(){
    //     return $this->hasMany(StudyPlan::class);
    // }
}
