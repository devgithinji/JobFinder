<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'phone_number',
        'gender',
        'dob',
        'experience',
        'bio',
        'cover_letter',
        'resume',
        'avatar'
    ];
}
