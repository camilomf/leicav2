<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name','description'];

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    public function software(){
        return $this->belongsToMany(Software::class,'software_by_place','software_id','place_id');
    }
}
