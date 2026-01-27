<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminCsvImportController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Beveiligde admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
	Route::get('/admin/upload-csv', [AdminCsvImportController::class, 'showForm'])->name('admin.upload.csv');
	Route::post('/admin/upload-csv', [AdminCsvImportController::class, 'handleUpload'])->name('admin.upload.csv.post');
});
