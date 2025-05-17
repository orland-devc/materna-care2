<?php

namespace Database\Seeders;

use App\Models\PatientRecord;
use App\Models\ScoringChart;
use App\Models\User;
use Illuminate\Database\Seeder;
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
            'medrec_code' => 'REC-2505-0001',
            'type' => 'adult',
            'lastName' => 'Sayson',
            'firstName' => 'Levi',
            'middleName' => 'Marbella',
            'wardService' => null,
            'permanentAddress' => 'General Mariano Alvarez, Cavite',
            'telephoneNumber' => '09852123789',
            'sex' => 'male',
            'civilStatus' => 'single',
            'birthDate' => null,
            'age' => '22',
            'birthPlace' => 'Urbiztondo, Pangasinan',
            'nationality' => 'Filipino',
            'religion' => 'Iglesia Ni Cristo',
            'occupation' => 'Teacher',
            'employer' => 'Isidro Marbella',
            'employerAddress' => 'General Mariano Alvarez, Cavite',
            'employerTelNo' => '09456789123',
            'fatherName' => 'Anthony Marbella',
            'fatherAddress' => 'Quezon City, Manila',
            'fatherTelNo' => '09963852741',
            'motherName' => 'Arlene Dela Cruz',
            'motherAddress' => 'Sawat, Urbiztondo',
            'motherTelNo' => '09789456123',
            'admissionDate' => null,
            'dischargeDate' => null,
            'totalDays' => null,
            'attendingPhysician' => 'Dr. Jose P. Rizal',
            'admissionType' => 'new',
            'referredBy' => 'Orland Sayson',
            'socialServiceClass' => 'a',
            'hospitalizationPlan' => 'Manulife',
            'healthInsurance' => 'PhilHealth (PH456789132)',
            'medicareType' => 'gsis-member',
            'allergies' => 'Chicken',
            'informant' => 'Orland Benniedict Sayson',
            'relationship' => 'Husband',
            'informantAddress' => 'Urbiztondo, Pangasinan',
            'informantTelNo' => '0994567412',
            'admissionDiagnosis' => 'None',
            'principalDiagnosis' => 'None',
            'otherDiagnosis' => 'None',
            'principalProcedure' => 'None',
            'otherProcedures' => 'None',
            'accidentDetails' => 'None',
            'placeOfOccurrence' => 'None',
            'disposition' => 'discharged',
            'autopsyStatus' => 'autopsy',
            'softDelete' => 1,
        ]);

        $this->command->info("Patient {$record->medrec_code} created successfully");

        $record2 = PatientRecord::create([
            'user_id' => 1,
            'medrec_code' => 'REC-2505-0002',
            'type' => 'infant',
            'lastName' => 'Sayson',
            'firstName' => 'Louis Oliver',
            'middleName' => 'Marbella',
            'wardService' => 'Prenatal Care',
            'permanentAddress' => 'General Mariano Alvarez, Cavite',
            'telephoneNumber' => null,
            'email' => null,
            'sex' => 'male',
            'civilStatus' => 'single',
            'birthDate' => '2028-05-28',
            'age' => '0',
            'birthPlace' => 'General Mariano Alvarez, Cavite',
            'nationality' => 'Filipino',
            'religion' => 'Iglesia Ni Cristo',
            'occupation' => null,
            'employer' => null,
            'employerAddress' => null,
            'employerTelNo' => null,
            'fatherName' => 'Orland Benniedict Sayson',
            'fatherAddress' => 'General Mariano Alvarez, Cavite',
            'fatherTelNo' => '09938424059',
            'motherName' => 'Levi Sayson',
            'motherAddress' => 'General Mariano Alvarez, Cavite',
            'motherTelNo' => '09915346922',
            'admissionDate' => '2025-05-15T13:53',
            'dischargeDate' => null,
            'totalDays' => null,
            'attendingPhysician' => 'Dr. Jose P. Rizal',
            'admissionType' => 'new',
            'referredBy' => 'Tropa',
            'socialServiceClass' => 'a',
            'hospitalizationPlan' => 'Manulife',
            'healthInsurance' => 'PhilHealth (PH456789132)',
            'medicareType' => 'gsis-member',
            'allergies' => null,
            'informant' => null,
            'relationship' => null,
            'informantAddress' => null,
            'informantTelNo' => null,
            'admissionDiagnosis' => null,
            'principalDiagnosis' => null,
            'otherDiagnosis' => null,
            'principalProcedure' => null,
            'otherProcedures' => null,
            'accidentDetails' => null,
            'placeOfOccurrence' => null,
            'disposition' => 'improved',
            'autopsyStatus' => 'no-autopsy',
            'softDelete' => 0,
        ]);

        $this->command->info("Patient {$record2->medrec_code} created successfully");

        $chart = ScoringChart::create([
            'patient_admission_id' => 1,
        ]);

    }
}
