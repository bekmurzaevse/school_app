<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\v1\AlbumController;
use App\Http\Controllers\v1\FaqController;
use App\Http\Controllers\v1\PhotoController;
use App\Http\Controllers\v1\DocumentController;
use App\Http\Controllers\v1\CategoryController;
use App\Http\Controllers\v1\EventController;
use App\Http\Controllers\v1\FileController;
use App\Http\Controllers\v1\PositionController;
use App\Http\Controllers\v1\NewsController;
use App\Http\Controllers\v1\SchoolController;
use App\Http\Controllers\v1\EmployeeController;
use App\Http\Controllers\v1\SchoolHourController;
use App\Http\Controllers\v1\TagController;
use App\Http\Controllers\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::pattern('id', '\d+');
Route::pattern('hash', '[a-z0-9]+');
Route::pattern('hex', '[a-f0-9]+');
Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
Route::pattern('base', '[a-zA-Z0-9]+');
Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('username', '[a-z0-9_-]{3,16}');

/**
 * Login
 */
Route::prefix('auth')->middleware('guest:sanctum')->group(function () {
    Route::post('login', [UserController::class, 'login']);
});

/**
 * User Profile and Logout
 */
Route::middleware(['auth:sanctum', 'ability:access-token'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('me', [UserController::class, 'profile']);
        Route::post('logout', [UserController::class, 'logout']);
    });
});

/**
 * Admin
 */
Route::middleware('auth:sanctum')->group(function () {
    Route::middleware( 'role:admin')->group(function () {
        Route::post('congratulation', [MainController::class, 'congratulation']);
        Route::get('list', [MainController::class, 'list']);

        Route::prefix('schools')->group(function () {
            Route::get('/', [SchoolController::class, 'index']);
            Route::post('/create', [SchoolController::class, 'create']);
            Route::put('/update/{id}', [SchoolController::class, 'update']);
            Route::delete('/delete/{id}', [SchoolController::class, 'delete']);
        });
        Route::prefix('employees')->group(function () {
            Route::get('/{id}', [EmployeeController::class, 'show']);
            Route::post('create', [EmployeeController::class, 'create']);
            Route::put('update/{id}', [EmployeeController::class, 'update']);
            Route::delete('delete/{id}', [EmployeeController::class, 'delete']);
        });
        Route::prefix('news')->group(function () {
            Route::post('create', [NewsController::class, 'create']);
            Route::put('update/{id}', [NewsController::class, 'update']);
            Route::delete('delete/{id}', [NewsController::class, 'delete']);
        });
        Route::prefix('tags')->group(function () {
            Route::get('/', [TagController::class, 'index']);
            Route::get('/{id}', [TagController::class, 'show']);
            Route::post('create', [TagController::class, 'create']);
            Route::put('update/{id}', [TagController::class, 'update']);
            Route::delete('delete/{id}', [TagController::class, 'delete']);
        });
        Route::prefix('positions')->group(function () {
            Route::get('/{id}', [PositionController::class, 'show']);
            Route::post('/create', [PositionController::class, 'create']);
            Route::put('/update/{id}', [PositionController::class, 'update']);
            Route::delete('/delete/{id}', [PositionController::class, 'delete']);
        });
        Route::prefix('albums')->group(function () {
            Route::post('/create', [AlbumController::class, 'create']);
            Route::put('/update/{id}', [AlbumController::class, 'update']);
            Route::delete('/delete/{id}', [AlbumController::class, 'delete']);
        });
        Route::prefix('photos')->group(function () {
            Route::post('/create', [PhotoController::class, 'create']);
            Route::post('/update/{id}', [PhotoController::class, 'update']);
            Route::delete('/delete/{id}', [PhotoController::class, 'delete']);
        });
        Route::prefix('documents')->group(function () {
            Route::post('upload', [DocumentController::class, 'upload']);
            Route::put('update/{id}', [DocumentController::class, 'update']);
            Route::delete('delete/{id}', [DocumentController::class, 'delete']);
        });
        Route::prefix('categories')->group(function () {
            Route::post('/create', [CategoryController::class, 'create']);
            Route::put('/update/{id}', [CategoryController::class, 'update']);
            Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
        });
        Route::prefix('events')->group(function () {
            Route::post('/create', [EventController::class, 'create']);
            Route::put('/update/{id}', [EventController::class, 'update']);
            Route::delete('/delete/{id}', [EventController::class, 'delete']);
        });
        Route::prefix('files')->group(function () {
            Route::post('/upload', [FileController::class, 'upload']);
            Route::put('/update/{id}', [FileController::class, 'update']);
            Route::delete('/delete/{id}', [FileController::class, 'delete']);
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/{id}', [UserController::class, 'show']);
            Route::post('/create', [UserController::class, 'create']);
            Route::put('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'delete']);
        });

        Route::prefix('faqs')->group(function () {
            Route::post('/create', [FaqController::class, 'create']);
            Route::put('/update/{id}', [FaqController::class, 'update']);
            Route::delete('/delete/{id}', [FaqController::class, 'delete']);
        });

        Route::prefix('school-hours')->group(function () {
            Route::post('/create', [SchoolHourController::class, 'create']);
            Route::put('/update/{id}', [SchoolHourController::class, 'update']);
            Route::delete('/delete/{id}', [SchoolHourController::class, 'delete']);
        });
    });

});

/**
 *  Index page
 */
Route::get('/', [MainController::class, 'index']);

Route::prefix('schools')->group(function () {
    Route::get('/{id}', [SchoolController::class, 'show']);
});
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
});
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('/{id}', [NewsController::class, 'show']);
});
Route::prefix('tags')->group(function () {

});
Route::prefix('positions')->group(function () {
    Route::get('/', [PositionController::class, 'index']);
});
Route::prefix('albums')->group(function () {
    Route::get('/', [AlbumController::class, 'index']);
    Route::get('/{id}', [AlbumController::class, 'show']);
});
Route::prefix('photos')->group(function () {
    Route::get('/', [PhotoController::class, 'index']);
    Route::get('/{id}', [PhotoController::class, 'show']);
});
Route::prefix('documents')->group(function () {
    Route::get('/', [DocumentController::class, 'index']);
    Route::get('show/{id}', [DocumentController::class, 'show']);
    Route::get('download/{id}', [DocumentController::class, 'download']);
});
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});
Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::get('/{id}', [EventController::class, 'show']);
});
Route::prefix('files')->group(function () {
    Route::get('/', [FileController::class, 'index']);
    Route::get('/{id}', [FileController::class, 'show']);
});

Route::prefix('faqs')->group(function () {
    Route::get('/', [FaqController::class, 'index']);
    Route::get('/{id}', [FaqController::class, 'show']);
});

Route::prefix('school-hours')->group(function () {
    Route::get('/', [SchoolHourController::class, 'index']);
    Route::get('/{id}', [SchoolHourController::class, 'show']);
});
