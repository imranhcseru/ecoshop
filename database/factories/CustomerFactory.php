<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName($gender = 'male'|'female'),
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => $faker->password,
        'created_at' => $faker->unixTime($max = 'now') ,
        'updated_at' => $faker->unixTime($max = 'now')
    ];
});
