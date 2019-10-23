<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
                            'serialnumber',
                            'sku',
                            'price',
                            'observation'
                        ];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function place(){
        return $this->belongsTo(Place::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class);
    }

    public function maintenancePlan(){
        return $this->belongsTo(MaintenancePlan::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function software(){
        return $this->belongsToMany(Software::class,'inventory_software','inventory_id','software_id');
    }

    public function maintenanceType(){
        return $this->belongsToMany(MaintenanceType::class,'maintenance_register','maintenance_type_id','inventory_id')->withPivot('date');
    }

    public function inventoryByLiable(){
        return $this->belongsToMany(Liable::class,'lending_register','liable_id','inventory_id')->withPivot('id','supossed_return_date','updated')->withTimestamps();
    }

}
