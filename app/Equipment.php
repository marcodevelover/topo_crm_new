<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public $table = 'equipments';
    protected $fillable = [
        'equipment',
        'brand',
        'model',
        'no_serie'
    ];
}
