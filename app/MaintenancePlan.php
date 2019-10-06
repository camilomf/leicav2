<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenancePlan extends Model
{
    protected $fillable = ['name','description'];

    public function frequency(){
        return $this->belongsTo(Frequency::class);
    }

    public function priority(){
        return $this->belongsTo(Priority::class);
    }

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }
}
