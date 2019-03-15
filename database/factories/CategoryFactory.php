<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'created_at' => $faker->unixTime($max = 'now') ,
        'updated_at' => $faker->unixTime($max = 'now')
    ];
});
