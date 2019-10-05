<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];

    public function assets(){
        return $this->belongsTo(Assets::class);
    }

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }
}
