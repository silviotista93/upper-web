<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarDetailSuscription extends Model
{
    //
    protected $table = 'car_detail_suscriptions';

    protected $fillable = [
        'carsus_id', 'plan_type_id', 'quantity'
    ];

    public function carDetailSusciption()
    {
        return $this->belongsToMany(CarSubscription::class, 'car_detail_suscriptions', 'carsus_id', 'plan_type_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // ----------------

    public function carSus(){
        return $this-> hasMany(CarSubscription::class, 'id', 'carsus_id');
    }

    public function planSus(){
        return $this-> hasMany(PlanTypeWash::class,'id', 'plan_type_id');
    }


}
