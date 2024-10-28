<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolStudentController;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);




















Route::get('/solstudents', [SolStudentController::class, 'index']);
Route::post('/solstudents', [SolStudentController::class, 'store']);
Route::put('/solstudents/{id}', [SolStudentController::class, 'update']);
Route::delete('/solstudents/{id}', [SolStudentController::class, 'destroy']);