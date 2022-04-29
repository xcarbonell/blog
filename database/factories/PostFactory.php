<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->word(5),
        'content' => $faker->text(150),
        'user_id' => rand(1, count(User::all())),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
