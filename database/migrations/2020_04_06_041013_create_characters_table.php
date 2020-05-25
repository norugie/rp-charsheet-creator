<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('char_name');
            $table->integer('age')->unsigned();
            $table->integer('apparent_age')->unsigned();
            $table->string('gender');
            $table->string('sexuality');
            $table->string('chardesc');
            $table->text('info')->nullable();
            $table->string('cover_img');
            $table->biginteger('author_id')->unsigned()->index();
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();
        });

        // Foreign Key
        Schema::table('characters', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
