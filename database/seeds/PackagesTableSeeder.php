<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $mock = [
          [
              'title' => 'Basic',
              'price_month' => '0',
              'price_year' => '190',
              'max_deposit' => '2000',
              'quantity' => '1',
              'linear_bonus_lvl1' => '10',
              'linear_bonus_lvl2' => '0',
              'binary_bonus_main' => '5',
              'binary_bonus_lvl1' => '0',
              'binary_bonus_lvl2' => '0',
              'binary_bonus_lvl3' => '0',
              'binary_bonus_lvl4' => '0',
              'binary_bonus_lvl5' => '0',

          ],[
              'title' => 'Master',
              'price_month' => '55',
              'price_year' => '490',
              'max_deposit' => '6000',
              'quantity' => '1',
              'linear_bonus_lvl1' => '12',
              'linear_bonus_lvl2' => '5',
              'binary_bonus_main' => '11',
              'binary_bonus_lvl1' => '6',
              'binary_bonus_lvl2' => '6',
              'binary_bonus_lvl3' => '5',
              'binary_bonus_lvl4' => '4',
              'binary_bonus_lvl5' => '3',
          ],[
              'title' => 'Expert',
              'price_month' => '100',
              'price_year' => '950',
              'max_deposit' => '18000',
              'quantity' => '2',
              'linear_bonus_lvl1' => '15',
              'linear_bonus_lvl2' => '6',
              'binary_bonus_main' => '13',
              'binary_bonus_lvl1' => '9',
              'binary_bonus_lvl2' => '9',
              'binary_bonus_lvl3' => '7',
              'binary_bonus_lvl4' => '6',
              'binary_bonus_lvl5' => '4',
          ],[
              'title' => 'Premiun',
              'price_month' => '190',
              'price_year' => '1900',
              'max_deposit' => 'без ограничений',
              'quantity' => '2',
              'linear_bonus_lvl1' => '20',
              'linear_bonus_lvl2' => '8',
              'binary_bonus_main' => '13',
              'binary_bonus_lvl1' => '12',
              'binary_bonus_lvl2' => '12',
              'binary_bonus_lvl3' => '10',
              'binary_bonus_lvl4' => '8',
              'binary_bonus_lvl5' => '6',
          ]
      ];

      foreach ($mock as $item) {
        \App\Package::create($item);
      }
    }
}
