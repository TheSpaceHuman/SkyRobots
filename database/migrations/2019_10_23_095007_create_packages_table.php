<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->float('price_month')->nullable();
            $table->float('price_year')->nullable();
            $table->float('linear_bonus_lvl1')->nullable();
            $table->float('linear_bonus_lvl2')->nullable();
            $table->float('binary_bonus_main')->nullable();
            $table->float('binary_bonus_lvl1')->nullable();
            $table->float('binary_bonus_lvl2')->nullable();
            $table->float('binary_bonus_lvl3')->nullable();
            $table->float('binary_bonus_lvl4')->nullable();
            $table->float('binary_bonus_lvl5')->nullable();
            $table->string('max_deposit')->nullable();
            $table->string('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
