<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('default.png');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert anon user
        DB::table('users')->insert(
            array(
                'name' => 'Anonymous User',
                'username' => 'anonuser',
                'email' => 'anon@rpcsc.com',
                'email_verified_at' => '2020-08-18 20:28:30',
                'password' => '$2y$10$kaTeQfIuznbY1Fymxu8kP.ge2lkDr5n5oF2/sh9fbwLx2PlFYuqUG',
                'avatar' => 'default.png',
                'created_at' => '2020-08-18 20:28:30',
                'updated_at' => '2020-08-18 20:28:30'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
