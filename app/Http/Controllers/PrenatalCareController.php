<?php

namespace App\Http\Controllers;

use App\Models\PrenatalCare;
use Illuminate\Http\Request;

class PrenatalCareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all prenatal care records
        // $prenatalCares = PrenatalCare::all()->sortByDesc('created_at');

        return view('livewire.admin.prenatal-care.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.admin.prenatal-care.create', [
            // Add any necessary data for the create view
        ]);
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
    public function show(PrenatalCare $prenatalCare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrenatalCare $prenatalCare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrenatalCare $prenatalCare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrenatalCare $prenatalCare)
    {
        //
    }
}
