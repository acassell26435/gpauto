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
        if (! Schema::hasTable('appointment_users')) {
            Schema::create('appointment_users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('appointment_id')->unsigned();
                $table->string('discount')->nullable();
                $table->string('advance')->nullable();
                $table->integer('payment_method_id')->nullable();
                $table->string('remark')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_users');
    }
};
