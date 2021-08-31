<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'place' => $faker->word,
        'applicants' => $faker->randomDigitNotNull,
        'body' => $faker->text,
        'name' =>$faker->userName,
        'content' =>$faker->realText
    ];
});
