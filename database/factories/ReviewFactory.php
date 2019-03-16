<?php

use Faker\Generator as Faker;
use App\Model\Product;
use App\Model\Customer;
$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'product_id' => function(){
            return Product::all()->random();
        },
        'customer_id' => function(){
            return Customer::all()->random();
        },
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0,5),
        'created_at' => $faker->unixTime($max = 'now') ,
        'updated_at' => $faker->unixTime($max = 'now')
    ];
});
