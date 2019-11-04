<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'dob'=>$faker->date('Y-m-d','now'),
        'story'=>$faker->sentence
    ];
});
