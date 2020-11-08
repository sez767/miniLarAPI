<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Person::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'phone_number' => $faker->sentence,
        'gmail' => $faker->sentence,
        'created_at' => $faker->dateTime,
    ];
    });
$factory->define(App\Models\Arrival::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'begin' => $faker->date(),
        'end' => $faker->date(),
        'tour_id' => $faker->sentence,
    ];
 });
$factory->define(App\Models\Tour::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'description' => $faker->text(),
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
 });
