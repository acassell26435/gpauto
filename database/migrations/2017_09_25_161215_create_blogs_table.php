<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('blogs')) {
            Schema::create('blogs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('img')->nullable();
                $table->integer('user_id');
                $table->date('date');
                $table->text('dtl');
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
        Schema::dropIfExists('blogs');
    }
}
