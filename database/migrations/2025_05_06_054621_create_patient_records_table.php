<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('medrec_code')->unique();
            $table->string('type')->nullable();
            $table->string('lastName')->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('wardService')->nullable();
            $table->text('permanentAddress')->nullable();
            $table->string('telephoneNumber')->nullable();
            $table->string('email')->nullable();
            $table->string('sex')->nullable();
            $table->string('civilStatus')->nullable();
            $table->dateTime('birthDate')->nullable();
            $table->string('age')->nullable();
            $table->string('birthPlace')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();

            $table->string('employer')->nullable();
            $table->string('employerAddress')->nullable();
            $table->string('employerTelNo')->nullable();

            $table->string('fatherName')->nullable();
            $table->string('fatherAddress')->nullable();
            $table->string('fatherTelNo')->nullable();
            $table->string('motherName')->nullable();
            $table->string('motherAddress')->nullable();
            $table->string('motherTelNo')->nullable();

            $table->dateTime('admissionDate')->nullable();
            $table->dateTime('dischargeDate')->nullable();
            $table->string('totalDays')->nullable();
            $table->string('attendingPhysician')->nullable();
            $table->string('admissionType')->nullable();
            $table->string('referredBy')->nullable();

            $table->string('socialServiceClass')->nullable();
            $table->string('hospitalizationPlan')->nullable();
            $table->string('healthInsurance')->nullable();
            $table->string('medicareType')->nullable();
            $table->text('allergies')->nullable();

            $table->string('informant')->nullable();
            $table->string('relationship')->nullable();
            $table->string('informantAddress')->nullable();
            $table->string('informantTelNo')->nullable();

            $table->text('admissionDiagnosis')->nullable();
            $table->text('principalDiagnosis')->nullable();
            $table->text('otherDiagnosis')->nullable();
            $table->text('principalProcedure')->nullable();
            $table->text('otherProcedures')->nullable();
            $table->string('accidentDetails')->nullable();
            $table->string('placeOfOccurrence')->nullable();

            $table->string('disposition')->nullable();
            $table->string('autopsyStatus')->nullable();

            $table->boolean('softDelete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_records');
    }
};
