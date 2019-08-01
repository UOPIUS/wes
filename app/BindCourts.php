<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BindCourts extends Model
{
    protected $table = 'bind_court_lga';
    protected $primaryKey = 'bind_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'bind_id',
        'court_id',
        'lga_id',
        'fee',
        'date_created',
        'address',
        'status'
    ];
}
