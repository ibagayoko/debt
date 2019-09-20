<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    $mnt = $faker->randomFloat(null,-1000, 200);
    return [
        'amount' => $mnt,
        'type'  => $mnt > 0 ? 'PAYE' : 'CREDIT',
        'date'  => $faker->dateTimeBetween('-1 year'),
        'time'  => $faker->time()
    ];
});
