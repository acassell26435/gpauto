<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('c_name');
                $table->string('logo');
                $table->string('mobile');
                $table->string('phone');
                $table->string('address');
                $table->string('email');
                $table->string('website');
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
        Schema::dropIfExists('contacts');
    }
}
