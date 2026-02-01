<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeuzedeelController;
use App\Http\Controllers\InschrijvingController;
use App\Http\Controllers\AdminCsvImportController;
use App\Http\Controllers\AdminKeuzedeelController;
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

    Route::get('/admin/keuzedelen', [AdminKeuzedeelController::class, 'index'])
        ->name('admin.keuzedelen.index');
    Route::get('/admin/keuzedelen/create', [AdminKeuzedeelController::class, 'create'])
        ->name('admin.keuzedelen.create');
    Route::post('/admin/keuzedelen', [AdminKeuzedeelController::class, 'store'])
        ->name('admin.keuzedelen.store');
    Route::get('/admin/keuzedelen/{keuzedeel}/edit', [AdminKeuzedeelController::class, 'edit'])
        ->name('admin.keuzedelen.edit');
    Route::put('/admin/keuzedelen/{keuzedeel}', [AdminKeuzedeelController::class, 'update'])
        ->name('admin.keuzedelen.update');
    Route::delete('/admin/keuzedelen/{keuzedeel}', [AdminKeuzedeelController::class, 'destroy'])
        ->name('admin.keuzedelen.destroy');
    Route::patch('/admin/keuzedelen/{keuzedeel}/toggle', [AdminKeuzedeelController::class, 'toggle'])
        ->name('admin.keuzedelen.toggle');
});