<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
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
     */
    public function down(): void
    {
        Schema::dropIfExists('washing_prices');
    }
};
