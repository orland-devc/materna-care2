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
            $table->foreignId('patient_admission_id')->nullable()->constrained('patient_records')->nullOnDelete();
            $table->dateTime('dateScored')->nullable();
            $table->integer('heartRate')->nullable();
            $table->integer('respiratory')->nullable();
            $table->integer('muscleTone')->nullable();
            $table->integer('reflexes')->nullable();
            $table->integer('color')->nullable();

            $table->integer('five_heartRate')->nullable();
            $table->integer('five_respiratory')->nullable();
            $table->integer('five_muscleTone')->nullable();
            $table->integer('five_reflexes')->nullable();
            $table->integer('five_color')->nullable();

            $table->integer('ten_heartRate')->nullable();
            $table->integer('ten_respiratory')->nullable();
            $table->integer('ten_muscleTone')->nullable();
            $table->integer('ten_reflexes')->nullable();
            $table->integer('ten_color')->nullable();

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
