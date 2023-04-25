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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('login',20)->unique()->nullable(false);
            $table->string('full_name',40)->nullable();
            $table->string('tel_number',15)->unique()->nullable(false)->default('');
            $table->string('password',255)->nullable(false);
            $table->date('birthday')->nullable();
            $table->string('sex',7)->nullable();
            $table->string('img',100)->nullable();
            $table->string('remember_token',100)->nullable();
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
        Schema::dropIfExists('users');
    }
};
