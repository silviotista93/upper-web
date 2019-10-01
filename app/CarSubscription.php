<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CarSubscription
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $plan_id
 * @property int $cars_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription whereCarsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarSubscription whereUpdatedAt($value)
 */
class CarSubscription extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 2;
    protected $table = 'car_subscriptions';

    protected $fillable = [
        'cars_id', 'plan_id', 'date_start', 'date_end'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'cars_id');
    }
    public function plans()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function carDetail()
    {
        return $this->belongsToMany(PlanTypeWash::class, 'car_detail_suscriptions', 'carsus_id', 'plan_type_id')->withPivot('id', 'quantity');
    }

    // public function carDetailSusciption()
    // {
    //     return $this->belongsTo(CarDetailSuscription::class);
    // }

  
}
