<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\AdminController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');

Route::get('/testimoni/{id}', [TestimoniController::class, 'testimoniById'])->name('testimoni.Id');
Route::post('/posttestimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
Route::put('/updatetestimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
Route::delete('/deletetestimoni/{id}', [TestimoniController::class, 'delete'])->name('testimoni.delete');

use App\Http\Controllers\ReportController;

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/reports', [ReportController::class, 'store'])->name('report.store');
Route::get('/reports/{id}', [ReportController::class, 'show'])->name('report.show');
Route::delete('/deletereports/{id}', [ReportController::class, 'destroy'])->name('report.destroy');


use App\Http\Controllers\CategoryController;

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');


// Route::apiResource('testimoni', TestimoniController::class);


// Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('editprofil')->middleware('auth');
// // Route to handle form submission and update profile
// Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update')->middleware('auth');
