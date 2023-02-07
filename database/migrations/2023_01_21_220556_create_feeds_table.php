<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_feed');
            $table->integer('price_of_feed');
            $table->integer('quantity_of_feed');
            $table->integer('quantity_of_eggs_used');
            $table->integer('number_of_birds_used');
            $table->string('category_of_feed');
            $table->string('size_of_feed');
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
        Schema::dropIfExists('feeds');
    }
}
