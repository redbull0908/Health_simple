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
        Schema::create('subscribes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_doctor')->unsigned();
            $table->bigInteger('id_service_category')->unsigned();
            $table->bigInteger('id_service')->unsigned();
            $table->string('time');
            $table->date('date');
            $table->string('user_login');
            $table->foreign('id_service_category')->references('id')->on('service_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_service')->references('id')->on('services')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_doctor')->references('id')->on('doctors')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribes');
    }
};
