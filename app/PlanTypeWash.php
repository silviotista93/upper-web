<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PlanTypeWash
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $type_wash_id
 * @property int $plan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash whereTypeWashId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash whereUpdatedAt($value)
 * @property int|null $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanTypeWash whereQuantity($value)
 */
class PlanTypeWash extends Model
{
    protected $table = "plan_type_washes";

    public function washType()
    {
        return $this->hasOne(Wash_type::class, 'id', 'type_wash_id');
    }

    public function carSuscription()
    {
        return $this->belongsToMany(CarSubscription::class, 'plan_type_id', 'carsus_id');
    }
    
}
