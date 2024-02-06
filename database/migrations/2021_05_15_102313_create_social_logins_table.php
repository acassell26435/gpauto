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
    public function up(): void
    {
        if (! Schema::hasTable('social_logins')) {
            Schema::create('social_logins', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->boolean('fb_login')->default(0);
                $table->boolean('google_login')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('social_login');
    }
};
