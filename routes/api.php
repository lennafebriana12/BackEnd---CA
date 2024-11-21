<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimoniController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::get('/testimoni/{id}', [TestimoniController::class, 'testimoniById'])->name('testimoni.Id');
Route::post('/posttestimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
Route::put('/updatetestimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
Route::delete('/deletetestimoni/{id}', [TestimoniController::class, 'delete'])->name('testimoni.delete');
