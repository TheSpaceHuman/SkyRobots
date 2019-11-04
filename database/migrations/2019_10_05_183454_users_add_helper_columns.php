<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersAddHelperColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable();
        $table->float('money')->nullable()->default(0);
        $table->dateTime('activated_to')->nullable();
        $table->string('region')->nullable();
        $table->string('registration_referral_link', 1024)->nullable();
        $table->string('provider_referral_link', 1024)->nullable();
        $table->string('brokerage_referral_link', 1024)->nullable();
        $table->integer('level_id')->nullable();
        $table->integer('package_id')->nullable();
        $table->integer('parent_id_linear')->nullable();
        $table->integer('parent_id_binary')->nullable();
        $table->integer('child_id_binary_left')->nullable();
        $table->integer('child_id_binary_right')->nullable();
        $table->string('role', 1024)->nullable();
        $table->string('avatar', 1024)->nullable()->default('users/noavatar.png');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('phone');
        $table->dropColumn('money');
        $table->dropColumn('activated_to');
        $table->dropColumn('region');
        $table->dropColumn('registration_referral_link');
        $table->dropColumn('provider_referral_link');
        $table->dropColumn('brokerage_referral_link');
        $table->dropColumn('level_id');
        $table->dropColumn('package_id');
        $table->dropColumn('parent_id_linear');
        $table->dropColumn('parent_id_binary');
        $table->dropColumn('child_id_binary_left');
        $table->dropColumn('child_id_binary_right');
        $table->dropColumn('role');
        $table->dropColumn('avatar');
      });
    }
}
