<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->timestamp('launch_date');
            $table->text('description');
            $table->string('slug');
            $table->string('picture')->nullable();
            $table->boolean('subscription_plan', [\App\Film::SUBSCRIPTION, \App\Film::NO_SUBSCRIPTION])->default(\App\Film::NO_SUBSCRIPTION);
            $table->float('sale_price');
            $table->float('rent_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
