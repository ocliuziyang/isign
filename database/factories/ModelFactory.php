<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Bus::class, function (\Faker\Generator $facker) {

    static $i = 0;
    $i++;

    return [
        'name' => $i.'号车',
        'description' => '',
        'is_active' => false,
        'status' => 0
    ];

});

$factory->define(\App\User::class, function (\Faker\Generator $factor) {

    static $password;

    return [
        'name' => $factor->name,
        'password' => $password ?: $password = bcrypt('test'),
        'bio' => $factor->sentence,
        'phone_number' => $factor->phoneNumber,
        'sex' => random_int(0, 1),
        'company' => $factor->company,
        'job' => $factor->jobTitle,
        'role_level' => 0
    ];

});