<?php

use Faker\Generator as Faker;

$factory->define(App\Purchase::class, function (Faker $faker) {
    return [
        //
        'price_paid' => ((mt_rand(1,10)/1000)*1000),
        'amount_purchased' => mt_rand(10,100),
        'customer_id' => $faker->numberBetween(1, App\Customer::count()),
        'merchandise_id' => $faker->numberBetween(1, App\Merchandise::count()),
    ];
});
