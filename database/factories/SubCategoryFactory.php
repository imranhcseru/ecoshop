<?php

use Faker\Generator as Faker;
use App\Model\Category;

$factory->define(App\Model\SubCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'category_id' => function(){
            return Category::all()->random();
        },
        'created_at' => $faker->unixTime($max = 'now') ,
        'updated_at' => $faker->unixTime($max = 'now')
    ];
});
