<?php

namespace App\Http\Controllers;

use App\Enums\AdmissionTypeEnum;
use App\Enums\PatientAutopsyStatusEnum;
use App\Enums\PatientCivilStatus;
use App\Enums\PatientDispositionEnum;
use App\Enums\PatientMedicareTypeEnum;
use App\Enums\PatientSexEnum;
use App\Enums\PatientTypeEnum;
use App\Models\PatientRecord;
use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientRecords = PatientRecord::where('softDelete', false)
            ->get()
            ->sortByDesc('created_at');

        return view('livewire.admin.patient-records.patient-record', compact('patientRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.admin.patient-records.create', [
            'admissionTypes' => AdmissionTypeEnum::options(),
            'autopsyStatuses' => PatientAutopsyStatusEnum::options(),
            'civilStatuses' => PatientCivilStatus::options(),
            'dispositions' => PatientDispositionEnum::options(),
            'medicareTypes' => PatientMedicareTypeEnum::options(),
            'patientSexes' => PatientSexEnum::options(),
            'patientTypes' => PatientTypeEnum::options(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'type' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'firstName' => 'nullable|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'wardService' => 'nullable|string|max:255',
            'permanentAddress' => 'nullable|string|max:500',
            'telephoneNumber' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'sex' => 'nullable|string|max:255',
            'civilStatus' => 'nullable|string|max:255',
            'age' => 'nullable|integer|min:0',
            'birthDate' => 'nullable|date',
            'birthPlace' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',

            'employer' => 'nullable|string|max:255',
            'employerAddress' => 'nullable|string|max:500',
            'employerTelNo' => 'nullable|string|max:50',

            'fatherName' => 'nullable|string|max:255',
            'fatherAddress' => 'nullable|string|max:500',
            'fatherTelNo' => 'nullable|string|max:50',
            'motherName' => 'nullable|string|max:255',
            'motherAddress' => 'nullable|string|max:500',
            'motherTelNo' => 'nullable|string|max:50',

            'admissionDate' => 'nullable|date',
            'admissionTime' => 'nullable|string|max:50',
            'dischargeDate' => 'nullable|date|after_or_equal:admissionDate',
            'dischargeTime' => 'nullable|string|max:50',
            'totalDays' => 'nullable|integer|min:0',
            'attendingPhysician' => 'nullable|string|max:255',
            'admissionType' => 'nullable|string|max:255',
            'referredBy' => 'nullable|string|max:255',

            'socialServiceClass' => 'nullable|string|max:255',
            'hospitalizationPlan' => 'nullable|string|max:255',
            'healthInsurance' => 'nullable|string|max:255',
            'medicareType' => 'nullable|string|max:255',
            'allergies' => 'nullable|string',

            'informant' => 'nullable|string|max:255',
            'relationship' => 'nullable|string|max:255',
            'informantAddress' => 'nullable|string|max:500',
            'informantTelNo' => 'nullable|string|max:50',

            'admissionDiagnosis' => 'nullable|string',
            'principalDiagnosis' => 'nullable|string',
            'otherDiagnosis' => 'nullable|string',
            'principalProcedure' => 'nullable|string',
            'otherProcedures' => 'nullable|string',
            'accidentDetails' => 'nullable|string',
            'placeOfOccurrence' => 'nullable|string|max:255',
            'disposition' => 'nullable|string|max:255',
            'autopsyStatus' => 'nullable|string|max:255',
        ]);

        $patientRecord = PatientRecord::create($validated);

        return redirect()->route('patient-records.show')
            ->with('status', 'Patient record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientRecord $patientRecord)
    {
        return view('livewire.admin.patient-records.show', compact('patientRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientRecord $patientRecord)
    {
        return view('livewire.admin.patient-records.edit', [
            'patientRecord' => $patientRecord,
            'admissionTypes' => AdmissionTypeEnum::options(),
            'autopsyStatuses' => PatientAutopsyStatusEnum::options(),
            'civilStatuses' => PatientCivilStatus::options(),
            'dispositions' => PatientDispositionEnum::options(),
            'medicareTypes' => PatientMedicareTypeEnum::options(),
            'patientSexes' => PatientSexEnum::options(),
            'patientTypes' => PatientTypeEnum::options(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientRecord $patientRecord)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'type' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'firstName' => 'nullable|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'wardService' => 'nullable|string|max:255',
            'permanentAddress' => 'nullable|string|max:500',
            'telephoneNumber' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'sex' => 'nullable|string|max:255',
            'civilStatus' => 'nullable|string|max:255',
            'age' => 'nullable|integer|min:0',
            'birthDate' => 'nullable',
            'birthPlace' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',

            'employer' => 'nullable|string|max:255',
            'employerAddress' => 'nullable|string|max:500',
            'employerTelNo' => 'nullable|string|max:50',

            'fatherName' => 'nullable|string|max:255',
            'fatherAddress' => 'nullable|string|max:500',
            'fatherTelNo' => 'nullable|string|max:50',
            'motherName' => 'nullable|string|max:255',
            'motherAddress' => 'nullable|string|max:500',
            'motherTelNo' => 'nullable|string|max:50',

            'admissionDate' => 'nullable|date',
            'dischargeDate' => 'nullable|date|after_or_equal:admissionDate',
            'totalDays' => 'nullable|integer|min:0',
            'attendingPhysician' => 'nullable|string|max:255',
            'admissionType' => 'nullable|string|max:255',
            'referredBy' => 'nullable|string|max:255',

            'socialServiceClass' => 'nullable|string|max:255',
            'hospitalizationPlan' => 'nullable|string|max:255',
            'healthInsurance' => 'nullable|string|max:255',
            'medicareType' => 'nullable|string|max:255',
            'allergies' => 'nullable|string',

            'informant' => 'nullable|string|max:255',
            'relationship' => 'nullable|string|max:255',
            'informantAddress' => 'nullable|string|max:500',
            'informantTelNo' => 'nullable|string|max:50',

            'admissionDiagnosis' => 'nullable|string',
            'principalDiagnosis' => 'nullable|string',
            'otherDiagnosis' => 'nullable|string',
            'principalProcedure' => 'nullable|string',
            'otherProcedures' => 'nullable|string',
            'accidentDetails' => 'nullable|string',
            'placeOfOccurrence' => 'nullable|string|max:255',
            'disposition' => 'nullable|string|max:255',
            'autopsyStatus' => 'nullable|string|max:255',
        ]);

        $patientRecord->update($validated);

        return redirect()->back()
            ->with('status', 'Patient record updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientRecord $patientRecord)
    {
        $patientRecord->delete();

        return redirect()->route('patient-records')
            ->with('status', 'Patient record deleted successfully!');
    }

    /**
     * Redirect to the patient records page.
     */
    public function redirectToPatientRecords()
    {
        return redirect()->route('patient-records');
    }

    /**
     * soft delete the patient record.
     */
    public function softDelete(PatientRecord $patientRecord)
    {
        $patientRecord->softDelete = true;
        $patientRecord->save();

        return redirect()->route('patient-records')
            ->with('status', 'Patient record has been moved to trash!');
    }

    /**
     * Restore the soft deleted patient record.
     */
    public function restore(PatientRecord $patientRecord)
    {
        $patientRecord->softDelete = false;
        $patientRecord->save();

        return redirect()->route('patient-records')
            ->with('status', 'Patient record has been restored!');
    }
}
