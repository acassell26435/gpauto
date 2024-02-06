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
        if (! Schema::hasTable('team_tasks')) {
            Schema::create('team_tasks', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('team_id');
                $table->integer('user_id');
                $table->text('task');
                $table->integer('status_id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_tasks');
    }
};
