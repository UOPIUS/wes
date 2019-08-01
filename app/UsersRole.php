<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    protected $table = 'userduty';
    protected $primaryKey = 'role_id';
    public $incrementing = false;
    public $timestamps = false;
}
