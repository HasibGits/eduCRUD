<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EducationalInfoController;

Route::get('/', function () {
    return view('index');
});


Route::get('/educational-info', [EducationalInfoController::class, 'index'])->name('educational-info.index');
Route::post('/educational-info', [EducationalInfoController::class, 'store'])->name('educational-info.store');
Route::put('/educational-info/{id}', [EducationalInfoController::class, 'update'])->name('educational-info.update');
Route::delete('/educational-info/{id}', [EducationalInfoController::class, 'destroy'])->name('educational-info.destroy');