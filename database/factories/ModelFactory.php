<?php

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->safeEmail,
        // 'group_id' => factory(App\Group::class)->create()->id,
    ];
});