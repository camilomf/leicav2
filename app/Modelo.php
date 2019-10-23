<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = ['name'];

    public function trademark(){
        return $this->belongsTo(Trademark::class);
    }

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    public function item(){
        return $this->hasMany(Item::class);
    }
}
