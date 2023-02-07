<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoultrydailiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poultrydailies', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_eggs');
            $table->integer('number_of_birds');
            $table->integer('yield_for_broilers');
            $table->integer('number_of_damaged_eggs');
            $table->integer('number_of_birds_dead');
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
        Schema::dropIfExists('poultrydailies');
    }
}
