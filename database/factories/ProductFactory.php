<?php

use Faker\Generator as Faker;
use App\Model\SubCategory;
use App\Model\Category;
use App\Model\Admin;
$factory->define(App\Model\Product::class, function (Faker $faker) {
    $filepath = storage_path('images');

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);  //follow the declaration to see the complete signature
    }
    return [
        'sub_category_id' => function(){
            return SubCategory::all()->random();
        },
        'name' => $faker->word,
        'image' => $faker->image($filepath,400,300),
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(100.0,30000.0),
        'discount' => $faker->numberBetween(2.0,50.0),
        'stock' => $faker->numberBetween(0,100),
        'created_at' => $faker->unixTime($max = 'now') ,
        'updated_at' => $faker->unixTime($max = 'now'),
        'admin_id' => function(){
            return Admin::all()->random();
        }
    ];
});
