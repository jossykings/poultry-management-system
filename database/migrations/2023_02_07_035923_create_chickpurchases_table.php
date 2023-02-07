<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChickpurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chickpurchases', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('company_name');
            $table->integer('yield')->default('0');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('total_price');
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
        Schema::dropIfExists('chickpurchases');
    }
}
