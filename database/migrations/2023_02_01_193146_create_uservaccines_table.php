<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUservaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uservaccines', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_vaccine');
            $table->string('expiry_date');
            $table->string('quantity_consumed');
            $table->string('description_of_vaccine');
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
        Schema::dropIfExists('uservaccines');
    }
}
