<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(App\Listing::class, function (Faker $faker) {
    $listingTypes = Config::get('constants.rentalTypes');
    $i = rand(0, count($listingTypes) - 1);

    return [
        'street_address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => 'UT', //$faker->stateAbbr,
        'zip_code' => $faker->postcode,
        'lng' => $faker->longitude($min = -111.3, $max = -111.9),
        'lat' => $faker->latitude($min = 39.9, $max = 40.7),
        'apt_num' => $faker->randomDigit,
        'date_available' => $faker->dateTimeBetween($startDate = '-30 days', $max = '+6 months'),
        'rental_type' => $listingTypes[$i],
        'monthly_price' => $faker->numberBetween($min = 200, $max = 2500),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'num_beds' => $faker->numberBetween($min = 1, $max = 3),
        'num_baths' => $faker->numberBetween($min = 1, $max = 3),
        'square_ft' => $faker->numberBetween($min = 750, $max = 2500),
    ];
});
