<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('char_images', function (Blueprint $table) {
            $table->id();
            $table->string('char_name');
            $table->biginteger('char_id')->unsigned()->index();
            $table->timestamps();
        });

        // Foreign Key
        Schema::table('char_images', function (Blueprint $table) {
            $table->foreign('char_id')->references('id')->on('characters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('char_images');
    }
}
