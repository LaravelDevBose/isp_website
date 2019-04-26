<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    const WIDTH =190;
    const HEIGHT = 190;

    protected $table = 'services';

    protected $primaryKey = 'service_id';

        protected $fillable = ['service_id', 'service_title','service_heading','service_details','service_logo', 'service_status'];

    public function scopeIsActive($query){
        $query->where('service_status', 'A');
    }

    public function getServiceLogoAttribute(){
        return asset($this->attributes['service_logo']);
    }
}
