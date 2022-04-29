<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use App\User;
use App\Post;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'comment' => $faker->text(100),
        'user_id' => rand(1, count(User::all())),
        'post_id' => rand(1, count(Post::all())),
        'created_at' => now(),
        'updated_at' => now()

    ];
});
