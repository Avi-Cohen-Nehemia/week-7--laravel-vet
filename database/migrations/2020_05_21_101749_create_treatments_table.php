<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string("name",50);
        });

        Schema::create('pet_treatment', function (Blueprint $table) {
            //still needs a regular id
            $table->id();
            
            // create the pet id column and foreign key
            $table->foreignId("pet_id")->unsigned();
            $table->foreign("pet_id")->references("id")
                  ->on("pets")->onDelete("cascade");
            
            // create the treatment id column and foreign key
            $table->foreignId("treatment_id")->unsigned();
            $table->foreign("treatment_id")->references("id")
                  ->on("treatments")->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('pet_treatment');
    }
}
