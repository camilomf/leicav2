<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['serialnumber','name','price'];

    public function modelo(){
        return $this->belongsTo(Modelo::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
