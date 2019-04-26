<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $primaryKey = 'package_id';

    protected $fillable = ['package_name','package_heading','package_tag','package_price','package_time','package_details','package_status'];

    public function scopeIsActive($query){
        $query->where('package_status', 'A');
    }

}
