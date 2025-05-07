<?php

use App\Http\Controllers\PatientRecordController;
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

    // Route::get('patient-records', function () {
    //     return view('welcome');
    // })->name('patient-records');

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

Route::get('patient-record', [PatientRecordController::class, 'index'])->name('patient-record');

Route::redirect('test', 'patient-records/adult');

require __DIR__.'/auth.php';
