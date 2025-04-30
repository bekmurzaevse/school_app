<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

Route::pattern('id', '\d+');

Route::get('/', function () {
    return Category::first()->name;
});

Route::prefix('employee')->group(function() {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('show/{id}', [EmployeeController::class, 'show']);
    Route::get('create', [EmployeeController::class, 'create']);
    Route::get('update', [EmployeeController::class, 'update']);
    Route::get('delete', [EmployeeController::class, 'delete']);
});
