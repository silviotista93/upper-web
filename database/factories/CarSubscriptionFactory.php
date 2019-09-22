<?php

use Faker\Generator as Faker;

$factory->define(App\CarSubscription::class, function (Faker $faker) {
    return [
        'plan_id' => \App\Plan::all()->random()->id,
        'cars_id' => \App\Car::all()->random()->id
    ];
});
