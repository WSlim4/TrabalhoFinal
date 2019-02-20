<?php

use Faker\Generator as Faker;
use App\Merchandise;

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

    ];
});
