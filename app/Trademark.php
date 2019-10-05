<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $fillable = ['name'];

    public function model(){
        return $this->hasMany(Modelo::class);
    }
}
