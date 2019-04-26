<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = ['headings','image_path','status'];

    protected $casts = [
        'headings'=>'array',
    ];

    public function getHeadingsAttribute($value){
        return json_decode($value);
    }

    public function scopeIsActive($query){
        $query->where('status', 'A');
    }

    public function getImagePathAttribute(){

        return asset($this->attributes['image_path']);
    }


}
