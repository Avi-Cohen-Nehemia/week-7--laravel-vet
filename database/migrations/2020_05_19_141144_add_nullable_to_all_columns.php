<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToAllColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->string('first_name', 50)->nullable()->change();
            $table->string('last_name', 50)->nullable()->change();
            $table->string('telephone', 11)->nullable()->change();
            $table->string('address_1', 100)->nullable()->change();
            $table->string('address_2', 100)->nullable()->change();
            $table->string('town', 50)->nullable()->change();
            $table->string('postcode', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->string('first_name', 50)->change();
            $table->string('last_name', 50)->change();
            $table->string('telephone', 11)->change();
            $table->string('address_1', 100)->change();
            $table->string('address_2', 100)->change();
            $table->string('town', 50)->change();
            $table->string('postcode', 10)->change();
        });
    }
}
