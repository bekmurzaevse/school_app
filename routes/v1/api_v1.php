<?php

use App\Http\Controllers\v1\AlbumController;
use App\Http\Controllers\v1\PhotoController;
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

Route::prefix('photos')->group(function () {
    Route::get('/', [PhotoController::class, 'index']);
    Route::get('/{id}', [PhotoController::class, 'show']);
    Route::post('/create', [PhotoController::class, 'create']);
    Route::post('/update/{id}', [PhotoController::class, 'update']);
    Route::delete('/delete/{id}', [PhotoController::class, 'delete']);
});
