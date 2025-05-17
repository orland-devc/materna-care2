<?php

use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\PrenatalCareController;
use App\Http\Controllers\ScoringChartController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'livewire.admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/patient-records/create', [PatientRecordController::class, 'create'])->name('patient-records.create');
    Route::post('/patient-records', [PatientRecordController::class, 'store'])->name('patient-records.store');

    Route::get('/patient-records', [PatientRecordController::class, 'index'])->name('patient-records');
    Route::get('/patient-records/{patientRecord}', [PatientRecordController::class, 'show'])->name('patient-records.show');

    Route::get('/patient-records/{patientRecord}/edit', [PatientRecordController::class, 'edit'])->name('patient-records.edit');
    Route::put('/patient-records/{patientRecord}', [PatientRecordController::class, 'update'])->name('patient-records.update');

    Route::delete('/patient-records/{patientRecord}', [PatientRecordController::class, 'softDelete'])->name('patient-records.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/prenatal-care/create', [PrenatalCareController::class, 'create'])->name('prenatal-care.create');
    Route::post('/prenatal-care', [PrenatalCareController::class, 'store'])->name('prenatal-care.store');

    Route::get('/prenatal-care', [PrenatalCareController::class, 'index'])->name('prenatal-care');
    Route::get('/prenatal-care/{patientRecord}', [PrenatalCareController::class, 'show'])->name('prenatal-care.show');

    Route::get('/prenatal-care/{patientRecord}/edit', [PrenatalCareController::class, 'edit'])->name('prenatal-care.edit');
    Route::put('/prenatal-care/{patientRecord}', [PrenatalCareController::class, 'update'])->name('prenatal-care.update');

    Route::delete('/prenatal-care/{patientRecord}', [PrenatalCareController::class, 'destroy'])->name('prenatal-care.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/scoring-chart/create', [ScoringChartController::class, 'create'])->name('scoring-chart.create');
    Route::post('/scoring-chart', [ScoringChartController::class, 'store'])->name('scoring-chart.store');

    Route::get('/scoring-chart', [ScoringChartController::class, 'index'])->name('scoring-chart');
    Route::get('/scoring-chart/{scoringChart}', [ScoringChartController::class, 'show'])->name('scoring-chart.show');

    Route::get('/scoring-chart/{scoringChart}/edit', [ScoringChartController::class, 'edit'])->name('scoring-chart.edit');
    Route::put('/scoring-chart/{scoringChart}', [ScoringChartController::class, 'update'])->name('scoring-chart.update');

    Route::delete('/scoring-chart/{scoringChart}', [ScoringChartController::class, 'destroy'])->name('scoring-chart.destroy');
});

Route::get('patient-record', [PatientRecordController::class, 'index'])->name('patient-record');

Route::redirect('test', 'patient-records/adult');

require __DIR__.'/auth.php';
