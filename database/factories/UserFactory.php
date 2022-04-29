<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Role;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->name(),
        'email' => $faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'role_id' => rand(1, count(Role::all())),
        'password' => Hash::make('0000'), // password
        'remember_token' => Str::random(10),
    ];
});
