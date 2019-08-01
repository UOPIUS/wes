<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locals extends Model
{
    protected $table = 'locals';
    protected $primaryKey = 'local_id';
    public $incrementing = false;
    public $timestamps = false;
}
