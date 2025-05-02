<?php

use App\Http\Controllers\v1\NewsController;
use App\Http\Controllers\v1\SchoolController;
use App\Http\Controllers\v1\EmployeeController;
use App\Http\Controllers\v1\TagController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

Route::pattern('id', '\d+');
Route::pattern('hash', '[a-z0-9]+');
Route::pattern('hex', '[a-f0-9]+');
Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
Route::pattern('base', '[a-zA-Z0-9]+');
Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('username', '[a-z0-9_-]{3,16}');

Route::get('/', function () {
    return Category::first()->name;
});

Route::prefix('schools')->group(function () {
    Route::get('/', [SchoolController::class, 'index']);
    Route::get('/{id}', [SchoolController::class, 'show']);
    Route::post('/create', [SchoolController::class, 'create']);
    Route::put('/update/{id}', [SchoolController::class, 'update']);
    Route::delete('/delete/{id}', [SchoolController::class, 'delete']);
});

Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/{id}', [EmployeeController::class, 'show']);
    Route::post('create', [EmployeeController::class, 'create']);
    Route::put('update/{id}', [EmployeeController::class, 'update']);
    Route::delete('delete/{id}', [EmployeeController::class, 'delete']);
});

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('/{id}', [NewsController::class, 'show']);
    Route::post('create', [NewsController::class, 'create']);
    Route::put('update/{id}', [NewsController::class, 'update']);
    Route::delete('delete/{id}', [NewsController::class, 'delete']);
});

Route::prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index']);
    Route::get('/{id}', [TagController::class, 'show']);
    Route::post('create', [TagController::class, 'create']);
    Route::put('update/{id}', [TagController::class, 'update']);
    Route::delete('delete/{id}', [TagController::class, 'delete']);
});