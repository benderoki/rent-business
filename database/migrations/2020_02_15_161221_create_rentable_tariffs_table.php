<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentableTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentable_tariffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('period_type', ['minutly', 'hourly', 'daily', 'monthly']);
            $table->enum('bill_type', ['every_period_time', 'once_per_period']);

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
        Schema::dropIfExists('rentable_tariffs');
    }
}
