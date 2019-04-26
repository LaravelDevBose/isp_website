<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table ='galleries';

    protected $primaryKey = 'gallery_id';

    protected $fillable=['gallery_title','gallery_url','gallery_type', 'gallery_status'];

    public function scopeIsActive($query){
        $query->where('gallery_status', 'A');
    }
}
