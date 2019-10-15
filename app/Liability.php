<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    protected $fillable = ['name'];

    public function liable(){
        return $this->hasMany(Liable::class);
    }
}
