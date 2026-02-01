<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeuzedeelController;
use App\Http\Controllers\InschrijvingController;
use App\Http\Controllers\AdminCsvImportController;
use App\Models\Keuzedeel;

// Auth routes toevoegen voor login, logout, register etc.
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/keuzedelen/{id}', [KeuzedeelController::class, 'show'])->name('keuzedelen.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/inschrijven', [InschrijvingController::class, 'create'])->name('inschrijven.create');
    Route::post('/inschrijven', [InschrijvingController::class, 'store'])->name('inschrijven.store');
    Route::get('/behaalde-keuzedelen', [\App\Http\Controllers\BehaaldeKeuzedelenController::class, 'index'])->name('behaalde-keuzedelen.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/upload-csv', [AdminCsvImportController::class, 'showForm'])
        ->name('admin.upload.csv');

    Route::post('/admin/upload-csv', [AdminCsvImportController::class, 'handleUpload'])
        ->name('admin.upload.csv.post');

    Route::delete('/admin/csv/{filename}', [AdminCsvImportController::class, 'deleteCsv'])
        ->name('admin.csv.delete');
});