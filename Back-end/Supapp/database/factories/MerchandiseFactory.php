<?php

use Faker\Generator as Faker;
<<<<<<< HEAD
use App\Merchandise;

$factory->define(Merchandise::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 3.0),
        'name' => 'filé de linguado',
        'category' => 'peixe',
        'measure'=> 'kg'
=======

$factory->define(App\Merchandise::class, function (Faker $faker) {
    $value = ['quilo','litro', 'caixa']; 
    $category = ['frango','suino', 'bovino','peixe','queijo','margarina',
    'leite','fruta', 'hortalica'];
    return [
        //
        'supplier_id' => $faker->numberBetween(1, App\Supplier::count()),
        'name' => $faker->name,
        'measure'=> $value[array_rand($value)],
        'category' => $category[array_rand($category)],
        'price' => (mt_rand(1, 9)/10)*100,
>>>>>>> 4f807891177a94cba0c8b23086717f8a64a407b8
    ];
});
