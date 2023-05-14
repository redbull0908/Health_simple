<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctor_id')->unsigned();
            $table->date('date');
            $table->bigInteger('schedule_template_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('schedule_template_id')->references('id')->on('schedule_templates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
