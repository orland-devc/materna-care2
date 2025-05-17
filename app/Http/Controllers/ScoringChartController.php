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
        $scoringCharts = ScoringChart::all()->sortByDesc('created_at');

        return view('livewire.admin.APGAR.index', compact('scoringCharts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = PatientRecord::where('softDelete', false)
            ->get()
            ->where('type', 'infant');

        return view('livewire.admin.APGAR.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_admission_id' => 'required|exists:patient_records,id',
            'dateScored' => 'required',
            'heartRate' => 'nullable|integer|max:255',
            'respiratory' => 'nullable|integer|max:255',
            'reflexes' => 'nullable|integer|max:255',
            'color' => 'nullable|integer|max:255',

            'five_heartRate' => 'nullable|integer|max:255',
            'five_respiratory' => 'nullable|integer|max:255',
            'five_muscleTone' => 'nullable|integer|max:255',
            'five_reflexes' => 'nullable|integer|max:255',
            'five_color' => 'nullable|integer|max:255',

            'ten_heartRate' => 'nullable|integer|max:255',
            'ten_respiratory' => 'nullable|integer|max:255',
            'ten_muscleTone' => 'nullable|integer|max:255',
            'ten_reflexes' => 'nullable|integer|max:255',
            'ten_color' => 'nullable|integer|max:255',

            'otherHeartRate' => 'nullable|integer|max:255',
            'otherRespiratory' => 'nullable|integer|max:255',
            'otherMuscleTone' => 'nullable|integer|max:255',
            'otherReflexes' => 'nullable|integer|max:255',
            'otherColor' => 'nullable|integer|max:255',
        ]);

        $chart = ScoringChart::create($validated);

        return redirect()->route('scoring-chart')
            ->with('status', 'APGAR Scoring Chart created successfully!');
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

        return view('livewire.admin.APGAR.edit', compact('scoringChart', 'patientRecords'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoringChart $scoringChart)
    {
        $validated = $request->validate([
            'heartRate' => 'nullable|integer|max:255',
            'respiratory' => 'nullable|integer|max:255',
            'muscleTone'  => 'nullable|integer|max:255',
            'reflexes' => 'nullable|integer|max:255',
            'color' => 'nullable|integer|max:255',

            'five_heartRate' => 'nullable|integer|max:255',
            'five_respiratory' => 'nullable|integer|max:255',
            'five_muscleTone' => 'nullable|integer|max:255',
            'five_reflexes' => 'nullable|integer|max:255',
            'five_color' => 'nullable|integer|max:255',

            'ten_heartRate' => 'nullable|integer|max:255',
            'ten_respiratory' => 'nullable|integer|max:255',
            'ten_muscleTone' => 'nullable|integer|max:255',
            'ten_reflexes' => 'nullable|integer|max:255',
            'ten_color' => 'nullable|integer|max:255',

            'otherHeartRate' => 'nullable|integer|max:255',
            'otherRespiratory' => 'nullable|integer|max:255',
            'otherMuscleTone' => 'nullable|integer|max:255',
            'otherReflexes' => 'nullable|integer|max:255',
            'otherColor' => 'nullable|integer|max:255',
        ]);

        $scoringChart->update($validated);

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
