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
use App\Http\Controllers\SystemController;
use App\Http\Controllers\System2Controller;
use App\Http\Controllers\System3Controller;
use App\Http\Controllers\System4Controller;
use App\Http\Controllers\System5Controller;

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/system', [SystemController::class, 'system'])->name('system.index');
Route::get('/system2', [System2Controller::class, 'system'])->name('system2.index');
Route::get('/system3', [System3Controller::class, 'system'])->name('system3.index');
Route::get('/system4', [System4Controller::class, 'system'])->name('system4.index');
Route::get('/system5', [System5Controller::class, 'system'])->name('system5.index');



// Route::apiResource('testimoni', TestimoniController::class);


// Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('editprofil')->middleware('auth');
// // Route to handle form submission and update profile
// Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update')->middleware('auth');
