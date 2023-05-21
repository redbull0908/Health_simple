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
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->default(null)->nullable();
            $table->string('experience');
            $table->string('specialization');
            $table->string('category')->default(null)->nullable();
            $table->string('img')->nullable();
            $table->bigInteger('id_service_category')->unsigned()->nullable()->default(null);
            $table->foreign('id_service_category')->references('id')->on('service_categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
