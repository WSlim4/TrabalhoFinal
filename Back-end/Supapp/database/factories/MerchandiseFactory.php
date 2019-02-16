<?php

use Faker\Generator as Faker;
use App\Merchandise;

$factory->define(Merchandise::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 3.0),
        'name' => 'filé de linguado',
        'category' => 'peixe',
        'measure'=> 'kg'
    ];
});
