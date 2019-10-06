<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['name',
                            'serialnumber',
                            'sku',
                            'price',
                            'technical_specifications',
                            'description',
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

    public function model(){
        return $this->belongsTo(Modelo::class);
    }

    public function maintenancePlan(){
        return $this->belongsTo(MaintenancePlan::class);
    }

    public function software(){
        return $this->belongsToMany(Software::class,'inventory_software','inventory_id','software_id');
    }

    // public function prestamo_inventario(){
    //     return $this->belongsToMany(StudyPlan::class,'software_plan_study','plan_study_id','software_id');
    // }

    // public function registro_mantencion(){
    //     return $this->belongsToMany(StudyPlan::class,'software_plan_study','plan_study_id','software_id');
    // }
}
