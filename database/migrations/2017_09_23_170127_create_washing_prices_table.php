<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWashingPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('washing_prices')) {
            Schema::create('washing_prices', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('washing_plan_id');
                $table->integer('vehicle_type_id');
                $table->string('price');
                $table->string('duration');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('washing_prices');
    }
}
