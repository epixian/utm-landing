<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Visit;
use Faker\Generator as Faker;

$factory->define(Visit::class, function (Faker $faker) {
    return [
        'utm_source' => $faker->domainWord,
        'utm_medium' => 'email',
        'utm_campaign' => 'asdf',
        'utm_term' => base64_encode(json_encode([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'approved' => $faker->numberBetween($min = 50000, $max = 2500000)
        ])),
        'utm_content' => ''
    ];
});
