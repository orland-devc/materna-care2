<?php

namespace App\Http\Controllers;

use App\Models\PatientRecord;
use App\Models\ScoringChart;
use Illuminate\Http\Request;

class ScoringChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charts = ScoringChart::all()->sortByDesc('created_at');

        return view('livewire.admin.APGAR.index', compact('patientRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patientRecords = PatientRecord::where('softDelete', false)->get();
        return view('livewire.admin.APGAR.create', compact('patientRecords'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_record_id' => 'required|exists:patient_records,id',
            'dateScored' => 'required|string|max:255',
            'heartRate' => 'nullable|int|max:255',
            'respiratory' => 'nullable|int|max:255',
            'reflexes' => 'nullable|int|max:255',
            'color' => 'nullable|int|max:255',

            '5heartRate' => 'nullable|int|max:255',
            '5respiratory' => 'nullable|int|max:255',
            '5muscleTone' => 'nullable|int|max:255',
            '5reflexes' => 'nullable|int|max:255',
            '5color' => 'nullable|int|max:255',

            '10heartRate' => 'nullable|int|max:255',
            '10respiratory' => 'nullable|int|max:255',
            '10muscleTone' => 'nullable|int|max:255',
            '10reflexes' => 'nullable|int|max:255',
            '10color' => 'nullable|int|max:255',

            'otherHeartRate' => 'nullable|int|max:255',
            'otherRespiratory' => 'nullable|int|max:255',
            'otherMuscleTone' => 'nullable|int|max:255',
            'otherReflexes' => 'nullable|int|max:255',
            'otherColor' => 'nullable|int|max:255',
        ]);

        $chart = ScoringChart::create($validated);

        return redirect()->route('scoring-chart')
            ->with('status', 'APGAR Scoring Chart created succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ScoringChart $scoringChart)
    {
        return view('livewire.admin.APGAR.show', compact('scoringChart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScoringChart $scoringChart)
    {
        $patientRecords = PatientRecord::where('softDelete', false)->get();
        return view('livewire.admin.APGAR.edit', compact('scoringChart, patientRecords'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoringChart $scoringChart)
    {
        $validated = $request->validate([
            'patient_record_id' => 'sometimes|exists:patient_records,id',
            'dateScored' => 'sometimes|string|max:255',
            'heartRate' => 'nullable|string|max:255',
            'respiratory' => 'nullable|string|max:255',
            'reflexes' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',

            '5heartRate' => 'nullable|string|max:255',
            '5respiratory' => 'nullable|string|max:255',
            '5muscleTone' => 'nullable|string|max:255',
            '5reflexes' => 'nullable|string|max:255',
            '5color' => 'nullable|string|max:255',

            '10heartRate' => 'nullable|string|max:255',
            '10respiratory' => 'nullable|string|max:255',
            '10muscleTone' => 'nullable|string|max:255',
            '10reflexes' => 'nullable|string|max:255',
            '10color' => 'nullable|string|max:255',

            'otherHeartRate' => 'nullable|string|max:255',
            'otherRespiratory' => 'nullable|string|max:255',
            'otherMuscleTone' => 'nullable|string|max:255',
            'otherReflexes' => 'nullable|string|max:255',
            'otherColor' => 'nullable|string|max:255',
        ]);

        $chart = ScoringChart::update($validated);

        return redirect()->back()
            ->with('status', 'APGAR Scoring Chart created succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoringChart $scoringChart)
    {
        $scoringChart->delete();

        return redirect()->route('scoring-chart')
            ->with('status', 'APGAR Scoring Chart deleted successfully!');
    }
}
