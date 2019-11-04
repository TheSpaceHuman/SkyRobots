<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Factory::create('ru_RU');

      foreach(range(1, 12) as $key)
      {
        $paragraphs = $faker->paragraphs(6);
        $body = implode("</p><p>", $paragraphs);
        $body = '<p>'.$body.'</p>';

        \App\News::create([
            'title' => $faker->sentence(3),
            'intro' => $faker->paragraph(2),
//            'image' => $faker->imageUrl(500, 300, 'cats'),
            'body' => $body
        ]);
      }
    }
}
