<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersRecord extends Model
{
    protected $table = 'users_info';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;
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
        'email',
        'img_url',
        'biometrics',
        'created_by',
        'date_created',
        'court_id'
    ];
    /**
    Full texts	user_id	fname	lname	mname	gender	phone	state_id	lga_id	address	email	img_url	biometrics	created_by	date_created	court_id
    **/
}
