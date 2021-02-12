<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('explanation', 255);
            $table->string('address', 255);
            $table->string('tel', 255);
            $table->string('holiday', 255);
            $table->string('seats', 255);
            $table->string('traffic', 255);
            $table->string('business_hours', 255);
            $table->string('parking', 255);
            $table->string('parking_map', 255);
            $table->string('parking2', 255)->nullable();
            $table->string('parking_map2', 255)->nullable();
            $table->string('facility', 255);
            $table->string('other', 255);
            $table->string('image_path1')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
