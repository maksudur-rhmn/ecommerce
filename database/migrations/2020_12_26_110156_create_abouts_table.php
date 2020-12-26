<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->longText('description');
            $table->string('image');
            $table->string('bottom_title_one');
            $table->longText('bottom_title_description_one');
            $table->string('bottom_title_image_one');
            $table->string('bottom_title_two');
            $table->longText('bottom_title_description_two');
            $table->string('bottom_title_image_two');
            $table->string('bottom_title_three');
            $table->longText('bottom_title_description_three');
            $table->string('bottom_title_image_three');
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
        Schema::dropIfExists('abouts');
    }
}
