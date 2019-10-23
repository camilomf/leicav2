<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    public function item(){
        return $this->hasMany(Item::class);
    }
}
