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
        if (! Schema::hasTable('washing_plan_includes')) {
            Schema::create('washing_plan_includes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('washing_plan_id')->unsigned();
                $table->string('washing_plan_include');
                $table->foreign('washing_plan_id')->references('id')->on('washing_plans')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('washing_plan_includes');
    }
};
