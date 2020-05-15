<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->text("pet_name", 20);
            $table->text('animal_type', 20);
            $table->date('dob', 100);
            $table->float("weight", 4, 2);
            $table->float("height", 2, 2);
            $table->foreignId("owner_id")->unsigned();
            $table->foreign("owner_id")->references("id")->on("owners")->onDelete("cascade");
            $table->enum("biteyness", [1, 2, 3, 4, 5]);
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
        Schema::dropIfExists('pets');
    }
}
