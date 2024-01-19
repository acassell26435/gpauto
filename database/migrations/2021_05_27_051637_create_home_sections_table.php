<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('home_sections')) {
            Schema::create('home_sections', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->boolean('slider_section')->default(0);
                $table->boolean('about_section')->default(0);
                $table->boolean('service_section')->default(0);
                $table->boolean('gallery_section')->default(0);
                $table->boolean('facts_section')->default(0);
                $table->boolean('team_section')->default(0);
                $table->boolean('plan_section')->default(0);
                $table->boolean('appointment_section')->default(0);
                $table->boolean('testinomial_section')->default(0);
                $table->boolean('blog_section')->default(0);
                $table->boolean('client_section')->default(0);
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
        Schema::dropIfExists('home_sections');
    }
}
