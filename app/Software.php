<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = ['name','version','description','observation'];
    
    public function softwareType(){
        return $this->belongsTo(SoftwareType::class);
    }
}
