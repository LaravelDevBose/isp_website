<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $table = 'user_messages';

    protected $fillable = ['name', 'email', 'phone_no', 'subject', 'message', 'status', 'reading', 'replied'];
}
