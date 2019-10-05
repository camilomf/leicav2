<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name','description'];

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }
}
