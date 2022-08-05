<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customercrm extends Model
{
    protected $connection = 'crm';
    public $timestamps = false;
    protected $table = 'customers';
}
