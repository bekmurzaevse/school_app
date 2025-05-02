<?php

use App\Http\Controllers\v1\AlbumController;
use App\Http\Controllers\v1\CategoryController;
use App\Http\Controllers\v1\EventController;
use App\Http\Controllers\v1\FileController;
use App\Http\Controllers\v1\PositionController;
use App\Http\Controllers\v1\SchoolController;
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

Route::prefix('positions')->group(function () {
    Route::get('/', [PositionController::class, 'index']);
    Route::get('/{id}', [PositionController::class, 'show']);
    Route::post('/create', [PositionController::class, 'create']);
    Route::put('/update/{id}', [PositionController::class, 'update']);
    Route::delete('/delete/{id}', [PositionController::class, 'delete']);

});

Route::prefix('albums')->group(function () {
    Route::get('/', [AlbumController::class, 'index']);
    Route::get('/{id}', [AlbumController::class, 'show']);
    Route::post('/create', [AlbumController::class, 'create']);
    Route::put('/update/{id}', [AlbumController::class, 'update']);
    Route::delete('/delete/{id}', [AlbumController::class, 'delete']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::post('/create', [CategoryController::class, 'create']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
});

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::get('/{id}', [EventController::class, 'show']);
    Route::post('/create', [EventController::class, 'create']);
    Route::put('/update/{id}', [EventController::class, 'update']);
    Route::delete('/delete/{id}', [EventController::class, 'delete']);
});

Route::prefix('files')->group(function () {
    Route::get('/', [FileController::class, 'index']);
    Route::get('/{id}', [FileController::class, 'show']);
    Route::post('/create', [FileController::class, 'create']);
    Route::put('/update/{id}', [FileController::class, 'update']);
    Route::delete('/delete/{id}', [FileController::class, 'delete']);
});

