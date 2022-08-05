<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // protected $connection = 'crm';
    // public $timestamps = false;
    // protected $table = 'customers';
    protected $fillable = [
        'name', 'address','email','phone'
    ];
}
