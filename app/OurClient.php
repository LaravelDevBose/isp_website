<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    const Width = 200;
    const Height = 200;

    protected $table = 'our_clients';

    protected $primaryKey = 'client_id';

    protected $fillable = [
        'client_comp_name',
        'client_website',
        'client_logo',
        'client_details',
        'client_status',
    ];

    public function scopeIsActive($query){
        return $query->where('client_status', 'A');
    }
}
