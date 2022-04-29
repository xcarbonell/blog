<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use App\User;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        //
        'text' => $faker->word(1),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
