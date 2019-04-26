<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';

    protected $primaryKey = 'member_id';

    protected $fillable = ['member_name','member_degi','member_position','member_image','social_link','member_status'];

    protected $casts = [
        'social_link'=>'array'
    ];

    public function getSocialLinkAttribute($value){
        return json_decode($value);
    }

    public function scopeIsActive($query){
        $query->where('member_status', 'A');
    }
}
