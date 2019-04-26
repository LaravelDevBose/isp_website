<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{

    const WIDTH =1894;
    const HEIGHT = 700;

    protected $table = 'generals';

    protected $fillable = ['type', 'details','image_path', 'status'];
     protected $appends = ['ShortContent'];

    public function scopeIsActive($query){
        $query->where('status', 'A');
    }

    public function getShortContentAttribute(){
        substr( strip_tags($this->attributes['details']), 0, 100);
    }

    public function getImagePathAttribute(){

        if(is_null($this->attributes['image_path'])){
            return asset('front/img/page-header/cover.jpg');
        }else{
            return asset($this->attributes['image_path']);
        }

    }
}
