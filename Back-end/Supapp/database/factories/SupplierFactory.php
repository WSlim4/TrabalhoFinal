<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function (Faker $faker) {

    return [
        //
        'user_id' => $faker->unique()->numberBetween(1, App\User::count()),
        'cnpj' => str_random(10),
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
