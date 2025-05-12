<?php

use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\PrenatalCareController;
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
    // CREATE
    Route::get('/patient-records/create', [PatientRecordController::class, 'create'])->name('patient-records.create');
    Route::post('/patient-records', [PatientRecordController::class, 'store'])->name('patient-records.store');

    // READ
    Route::get('/patient-records', [PatientRecordController::class, 'index'])->name('patient-records');
    Route::get('/patient-records/{patientRecord}', [PatientRecordController::class, 'show'])->name('patient-records.show');

    // UPDATE
    Route::get('/patient-records/{patientRecord}/edit', [PatientRecordController::class, 'edit'])->name('patient-records.edit');
    Route::put('/patient-records/{patientRecord}', [PatientRecordController::class, 'update'])->name('patient-records.update');

    // DELETE
    Route::delete('/patient-records/{patientRecord}', [PatientRecordController::class, 'destroy'])->name('patient-records.destroy');    
});

Route::middleware(['auth', 'verified'])->group(function () {
    // CREATE
    Route::get('/prenatal-care/create', [PrenatalCareController::class, 'create'])->name('prenatal-care.create');
    Route::post('/prenatal-care', [PrenatalCareController::class, 'store'])->name('prenatal-care.store');

    // READ
    Route::get('/prenatal-care', [PrenatalCareController::class, 'index'])->name('prenatal-care');
    Route::get('/prenatal-care/{patientRecord}', [PrenatalCareController::class, 'show'])->name('prenatal-care.show');

    // UPDATE
    Route::get('/prenatal-care/{patientRecord}/edit', [PrenatalCareController::class, 'edit'])->name('prenatal-care.edit');
    Route::put('/prenatal-care/{patientRecord}', [PrenatalCareController::class, 'update'])->name('prenatal-care.update');

    // DELETE
    Route::delete('/prenatal-care/{patientRecord}', [PrenatalCareController::class, 'destroy'])->name('prenatal-care.destroy');    
});

Route::get('patient-record', [PatientRecordController::class, 'index'])->name('patient-record');

Route::redirect('test', 'patient-records/adult');

require __DIR__.'/auth.php';
