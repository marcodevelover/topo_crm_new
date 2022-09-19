<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $connection = 'crm';
    public $timestamps = false;
    protected $table = 'service_orders';

    public function customer()
    {
      return $this->hasOne('App\Customercrm','id', 'customer_id');
    }

    public function product(){
        return $this->hasOne('App\Product','id', 'product_id');
    }



}
