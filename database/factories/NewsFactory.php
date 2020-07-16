<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');
        return [
            'title' => $faker->word,
            'description' => $faker->sentence(rand(2,4), true),
            'author_id' => rand(1,3),
            'rubric_id' => rand(1,2),
            'created_at' => $createdAt,
            'updated_at' => $createdAt
         ];
});
