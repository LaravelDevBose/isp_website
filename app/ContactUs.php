<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{

    const WIDTH =1894;
    const HEIGHT = 700;


    protected $table = 'contact_uses';
    protected $primaryKey = 'id';

    protected $fillable = ['title','address', 'phone_no', 'email', 'maps', 'image_path', 'details','status'];

    protected $casts= ['phone_no'=>'array'];

    public function getPhoneNoAttribute($value){
        return json_decode($value);
    }

    public function scopeIsActive($query){
        $query->where('status', 'A');
    }


    public function getImagePathAttribute(){

        if(is_null($this->attributes['image_path'])){
            return asset('front/img/page-header/cover.jpg');
        }else{
            return asset($this->attributes['image_path']);
        }

    }
}
