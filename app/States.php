<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    
    /**
    protected $fillable = [
        'name',
    ];
    protected $table = 'states';
    // DEFINE RELATIONSHIPS --------------------------------------------------
    //** each state HAS many Locals 
    public function fetchLga() {
        return $this->belongsToMany('Locals'); // this matches the Eloquent model
    }
    
    // each bear climbs many trees
    public function fetchLocals() {
        return $this->hasMany('Locals');
    }
    **/
    protected $table = 'states';
    protected $primaryKey = 'state_id';
    public $incrementing = false;
    public $timestamps = false;
}
