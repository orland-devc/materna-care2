<?php

namespace App\Http\Controllers;

use App\Models\TestSave;
use Illuminate\Http\Request;

class TestSaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientRecords = TestSave::all();

        return view('livewire.admin.patient-records.patient-record', compact('patientRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.admin.patient-records.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        TestSave::create($validated);

        return redirect()->route('patient-records')->with('success', 'Test save created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TestSave $testSave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestSave $testSave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestSave $testSave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestSave $testSave)
    {
        //
    }
}
