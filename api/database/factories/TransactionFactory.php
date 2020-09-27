<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'from' => $faker->numberBetween($min = 1, $max = 2),
        'to' => $faker->numberBetween($min = 1, $max = 2),
        'details' => $faker->sentence,
        'amount' => $faker->numberBetween($min = 1000, $max = 5000),

    ];
});
