<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    protected $fillable = ['name','description'];

    public function maintenancePlan(){
        return $this->hasMany(MaintenancePlan::class);
    }
}
