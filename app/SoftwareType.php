<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareType extends Model
{
    protected $fillable = ['name','description'];

    public function software(){
        return $this->hasMany(Software::class);
    }
}
