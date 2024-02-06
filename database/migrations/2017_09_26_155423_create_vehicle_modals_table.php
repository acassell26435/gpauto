<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('vehicle_modals')) {
            Schema::create('vehicle_modals', function (Blueprint $table) {
                $table->increments('id');
                $table->string('vehicle_modal');
                $table->integer('vehicle_company_id')->unsigned();
                $table->foreign('vehicle_company_id')->references('id')->on('vehicle_companies')->onDelete('cascade');
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
        Schema::dropIfExists('vehicle_modals');
    }
};
