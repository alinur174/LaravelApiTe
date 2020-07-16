<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use App\Models\Authors;


$factory->define(Authors::class, function (Faker $faker) {
    return [
        'name' => $faker->userName(0, 1),
        'email' => $faker->email,
    ];
});
