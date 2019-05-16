<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'approved' => $faker->biasedNumberBetween($min = 50000, $max = 400000, $function = 'sqrt')
    ];
});
