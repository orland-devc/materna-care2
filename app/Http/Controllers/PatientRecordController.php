<?php

namespace App\Http\Controllers;

use App\Models\PatientRecord;
use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all patient records
        $patientRecords = PatientRecord::all();

        // Return the view with the patient records
        return view('admin.patient-records.new-patient-record', compact('patientRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientRecord $patientRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientRecord $patientRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PatientRecord $patientRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientRecord $patientRecord)
    {
        //
    }
}
