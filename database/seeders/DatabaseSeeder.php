<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PatientRecord;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $info = [
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Create User
        $user = User::create([
            'name' => 'Orland Benniedict Sayson',
            'email' => 'orlandsayson30@gmail.com',
            'password' => Hash::make('orlandsayson30'),
        ]);

        $this->command->info("User {$user->email} created successfully");

        // Create Patient Record
        $record = PatientRecord::create([
            'user_id' => $user->id,
            'medrec_code' => "REC-2505-0001",
            'type' => "adult",
            'lastName' => "Sayson",
            'firstName' => "Levi",
            'middleName' => "Marbella",
            'wardService' => null,
            'permanentAddress' => "General Mariano Alvarez, Cavite",
            'telephoneNumber' => "09852123789",
            'sex' => "male",
            'civilStatus' => "single",
            'birthDate' => null,
            'age' => "22",
            'birthPlace' => "Urbiztondo, Pangasinan",
            'nationality' => "Filipino",
            'religion' => "Iglesia Ni Cristo",
            'occupation' => "Teacher",
            'employer' => "Isidro Marbella",
            'employerAddress' => "General Mariano Alvarez, Cavite",
            'employerTelNo' => "09456789123",
            'fatherName' => "Anthony Marbella",
            'fatherAddress' => "Quezon City, Manila",
            'fatherTelNo' => "09963852741",
            'motherName' => "Arlene Dela Cruz",
            'motherAddress' => "Sawat, Urbiztondo",
            'motherTelNo' => "09789456123",
            'admissionDate' => null,
            'dischargeDate' => null,
            'totalDays' => null,
            'attendingPhysician' => "Dr. Jose P. Rizal",
            'admissionType' => "new",
            'referredBy' => "Orland Sayson",
            'socialServiceClass' => "A",
            'hospitalizationPlan' => "Manulife",
            'healthInsurance' => "PhilHealth (PH456789132)",
            'medicareType' => "gsis-member",
            'allergies' => "Chicken",
            'informant' => "Orland Benniedict Sayson",
            'relationship' => "Husband",
            'informantAddress' => "Urbiztondo, Pangasinan",
            'informantTelNo' => "0994567412",
            'admissionDiagnosis' => "None",
            'principalDiagnosis' => "None",
            'otherDiagnosis' => "None",
            'principalProcedure' => "None",
            'otherProcedures' => "None",
            'accidentDetails' => "None",
            'placeOfOccurrence' => "None",
            'disposition' => "discharged",
            'autopsyStatus' => "autopsy",
            'softDelete' => 1,
        ]);

        $this->command->info("Patient {$record->medrec_code} created successfully");
    }
}