<?php
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Factory::create('ru_RU');

    foreach(range(1, 50) as $key)
    {
      \App\User::create([
//          'name' => $faker->unique()->word, //Unique username
          'name' => $faker->firstNameMale . ' ' . $faker->lastName,
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
          'level_id' => $faker->numberBetween(1, 5),
          'package_id' => $faker->numberBetween(1, 4),
          'role' => 'user',
//          'parent_id_linear' => $faker->numberBetween(1, 50),
//          'parent_id_binary' => $faker->numberBetween(1, 50),
      ]);
    }

// AddAdmin
    $checkAdmin = \App\User::where('email', 'artemcool1213@gmail.com')->get()->toArray();

    if(empty($checkAdmin)) {
      \App\User::create([
          'name' => 'TheSpaceHuman',
          'email' => 'artemcool1213@gmail.com',
          'email_verified_at' => now(),
          'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
          'remember_token' => Str::random(10),
          'phone' => $faker->phoneNumber,
          'money' => 1000, // В рублях
          'activated_to' => $faker->dateTimeBetween('now', '+2 years', 'Europe/Moscow'), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
          'region' => $faker->city,
          'registration_referral_link' => Str::random(24),
          'level_id' => $faker->numberBetween(1, 5),
          'package_id' => $faker->numberBetween(1, 4),
          'role' => 'admin',
      ]);
    }

  }
}
