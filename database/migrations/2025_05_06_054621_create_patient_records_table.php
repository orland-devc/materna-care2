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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('patient_code')->unique();
            $table->string('type')->nullable();
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->text('permanentAddress');
            $table->string('telephoneNumber')->nullable();
            $table->string('sex');
            $table->string('civilStatus');
            $table->dateTime('birthDate');
            $table->string('age');
            $table->string('birthPlace');
            $table->string('nationality');
            $table->string('religion');
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
    
            $table->dateTime('admissionDate')->default(now());
            $table->dateTime('dischargeDate')->nullable();
            $table->string('totalDays')->nullable();
            $table->string('attendingPhysician');
            $table->string('admissionType');
            $table->string('referredBy')->nullable();
    
            $table->string('socialServiceClass')->nullable();
            $table->string('hospitalizationPlan')->nullable();
            $table->string('healthInsurance')->nullable();
            $table->string('medicareType')->nullable();
            $table->text('allergies')->nullable();
    
            $table->text('admissionDiagnosis')->nullable();
            $table->text('principalDiagnosis')->nullable();
            $table->text('otherDiagnosis')->nullable();
            $table->text('principalProcedure')->nullable();
            $table->text('otherProcedures')->nullable();
            $table->string('accidentDetails')->nullable();
            $table->string('placeOfOccurrence')->nullable();
    
            $table->string('disposition')->nullable();
            $table->string('autopsyStatus')->nullable();
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
