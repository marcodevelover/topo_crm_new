<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = [
        'customer_id',
        'equipment_id',
        'user_id',
        'pattern_id',
        'folio',
        'date',
        'temperature',
        'cumple',
        'pressure',
        'humidity',
        'hour',
        'sisolev',
        'observation',
        'measurements'
    ];
    protected $casts = [
        'measurements' => 'array'
    ];

    public function customer()
    {
      return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function customers()
    {
      return $this->hasMany('App\Customer','id', 'customer_id');
    }

    public function equipment(){
        return $this->hasMany('App\Equipment','id', 'equipment_id');
    }

    public function pattern(){
        return $this->hasOne('App\Pattern','id', 'pattern_id');
    }

    public function user(){
        return $this->hasOne('App\User','id', 'user_id');
    }
}
