<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'crm';
    public $timestamps = false;
    protected $table = 'products';
}
