<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word, //Unique username
        'full_name' => $faker->firstNameMale . ' ' . $faker->lastName,
        'email' => $faker->unique()->freeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'phone' => $faker->phoneNumber,
        'money' => $faker->numberBetween(100, 50000), // В рублях
        'activated_to' => $faker->dateTimeBetween('now', '+2 years', 'Europe/Moscow'), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
        'region' => $faker->city,
        'registration_referral_link' => Str::random(24),
//        'provider_referral_link' => Str::random(24),
//        'brokerage_referral_link' => Str::random(24),
        'level' => $faker->numberBetween(1, 10),
        'package' => $faker->numberBetween(1, 10),
        'role' => 'user',
//        'parent_id_linear' => $faker->numberBetween(1, 50),
//        'parent_id_binary' => $faker->numberBetween(1, 50),
    ];
});
