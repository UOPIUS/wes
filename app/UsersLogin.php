<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersLogin extends Model
{
    protected $table = 'userlogin';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        
	'duty','status','verify_url','username',
        'lastaccess',	'ipaddress',	'date_created',	'id','password'
    ];
}
