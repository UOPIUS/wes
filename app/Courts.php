<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courts extends Model
{
    protected $table = 'court_info';
    protected $primaryKey = 'court_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'court_id',
        'description',
        'createdby',
        'date_created',
        'img_url',
        'status'
    ];
    //court_id	description	createdby	date_created,status	img_url
}
