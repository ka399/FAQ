<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->title($nbSentences = 3, $variableNbSentences = true),
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
