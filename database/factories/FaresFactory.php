<?php

$factory->define(App\Models\Fare::class, function (Faker\Generator $faker) {
    return [
        'code' => 'Y',
        'name' => 'Economy',
        'price' => '100',
        'capacity' => '200',
    ];
});
