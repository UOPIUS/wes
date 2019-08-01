<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionFee extends Model
{
    protected $table = 'transaction_fee';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
