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
        Schema::create('scoring_charts', function (Blueprint $table) {
            $table->id();
            $table->string('patient_admission_id')->nullable()->constrained()->nullOnDelete();
            $table->dateTime('dateScored')->nullable();
            $table->integer('heartRate')->nullable();
            $table->integer('respiratory')->nullable();
            $table->integer('muscleTone')->nullable();
            $table->integer('reflexes')->nullable();
            $table->integer('color')->nullable();

            $table->integer('5heartRate')->nullable();
            $table->integer('5respiratory')->nullable();
            $table->integer('5muscleTone')->nullable();
            $table->integer('5reflexes')->nullable();
            $table->integer('5color')->nullable();

            $table->integer('10heartRate')->nullable();
            $table->integer('10respiratory')->nullable();
            $table->integer('10muscleTone')->nullable();
            $table->integer('10reflexes')->nullable();
            $table->integer('10color')->nullable();

            $table->integer('otherHeartRate')->nullable();
            $table->integer('otherRespiratory')->nullable();
            $table->integer('otherMuscleTone')->nullable();
            $table->integer('otherReflexes')->nullable();
            $table->integer('otherColor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scoring_charts');
    }
};
