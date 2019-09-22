<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarDetailSuscription extends Model
{
    //
    protected $table = 'car_detail_suscriptions';
    
    protected $fillable = [
        'carsus_id','plan_type_id','quantity'
    ];
}
