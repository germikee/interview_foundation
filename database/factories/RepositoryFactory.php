<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $user = factory(User::class)->create();

    return [
        'name' => $faker->word,
        'url' => $faker->url,
        'user_id' => $user->id,
        'description' => $faker->sentence,
    ];
});
