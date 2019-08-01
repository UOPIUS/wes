<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model
{

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'mname',
        'gender',
        'phone',
        'state_id',
        'lga_id',
        'address',
        'img_url',
        'biometrics',
        'createdby',
        'court_id',
    ];
}
