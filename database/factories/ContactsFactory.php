<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'avatar'     => $faker->imageUrl($width = 640, $height = 480),
        'address'    => $faker->streetAddress,
        'city'       => $faker->city,
        'zip'        => $faker->randomNumber(6),
        'email'      => $faker->unique()->email,
        'phone'      => $faker->phoneNumber,
        'note'       => $faker->realText(2000)
    ];
});
