<?php

use App\Http\Controllers\v1\AlbumController;
use App\Http\Controllers\v1\PhotoController;
use App\Http\Controllers\v1\DocumentController;
use App\Http\Controllers\v1\CategoryController;
use App\Http\Controllers\v1\EventController;
use App\Http\Controllers\v1\FileController;
use App\Http\Controllers\v1\PositionController;
use App\Http\Controllers\v1\NewsController;
use App\Http\Controllers\v1\SchoolController;
use App\Http\Controllers\v1\EmployeeController;
use App\Http\Controllers\v1\TagController;
use App\Http\Controllers\v1\UserController;
use App\Models\Employee;
use Carbon\Carbon;
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
Route::middleware( 'role:admin')->group(function () {
    Route::prefix('schools')->group(function () {
        Route::get('/', [SchoolController::class, 'index']);//Admin
        Route::post('/create', [SchoolController::class, 'create']);//Admin
        Route::put('/update/{id}', [SchoolController::class, 'update']);//Admin
        Route::delete('/delete/{id}', [SchoolController::class, 'delete']);//Admin
    });
    Route::prefix('employees')->group(function () {
        Route::get('/{id}', [EmployeeController::class, 'show']);
        Route::post('create', [EmployeeController::class, 'create']);
        Route::put('update/{id}', [EmployeeController::class, 'update']);
        Route::delete('delete/{id}', [EmployeeController::class, 'delete']);
    });
    Route::prefix('news')->group(function () {
        Route::post('create', [NewsController::class, 'create']);//Admin
        Route::put('update/{id}', [NewsController::class, 'update']);//Admin
        Route::delete('delete/{id}', [NewsController::class, 'delete']);//Admin
    });
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index']);//Admin
        Route::get('/{id}', [TagController::class, 'show']);//Admin
        Route::post('create', [TagController::class, 'create']);//Admin
        Route::put('update/{id}', [TagController::class, 'update']);//Admin
        Route::delete('delete/{id}', [TagController::class, 'delete']);//Admin
    });
    Route::prefix('positions')->group(function () {
        Route::get('/{id}', [PositionController::class, 'show']);//Admin
        Route::post('/create', [PositionController::class, 'create']);//Admin
        Route::put('/update/{id}', [PositionController::class, 'update']);//Admin
        Route::delete('/delete/{id}', [PositionController::class, 'delete']);//Admin
    });
    Route::prefix('albums')->group(function () {
        Route::post('/create', [AlbumController::class, 'create']);//Admin
        Route::put('/update/{id}', [AlbumController::class, 'update']);//Admin
        Route::delete('/delete/{id}', [AlbumController::class, 'delete']);//Admin
    });
    Route::prefix('photos')->group(function () {
        Route::post('/create', [PhotoController::class, 'create']);//Admin
        Route::post('/update/{id}', [PhotoController::class, 'update']);//Admin
        Route::delete('/delete/{id}', [PhotoController::class, 'delete']);//Admin
    });
    Route::prefix('documents')->group(function () {
        Route::post('upload', [DocumentController::class, 'upload']);//Admin
        Route::put('update/{id}', [DocumentController::class, 'update']);//Admin
        Route::delete('delete/{id}', [DocumentController::class, 'delete']);//Admin
    });
    Route::prefix('categories')->group(function () {
        Route::post('/create', [CategoryController::class, 'create']);//Admin
        Route::put('/update/{id}', [CategoryController::class, 'update']);//Admin
        Route::delete('/delete/{id}', [CategoryController::class, 'delete']);//Admin
    });
    Route::prefix('events')->group(function () {
        Route::post('/create', [EventController::class, 'create']);//Admin
        Route::put('/update/{id}', [EventController::class, 'update']);//Admin
        Route::delete('/delete/{id}', [EventController::class, 'delete']);//Admin
    });
    Route::prefix('files')->group(function () {
        Route::post('/upload', [FileController::class, 'upload']);//Admin
        Route::put('/update/{id}', [FileController::class, 'update']);//Admin
        Route::delete('/delete/{id}', [FileController::class, 'delete']);//Admin
    });

});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);//User
    Route::get('/{id}', [UserController::class, 'show']);//User
    Route::post('/create', [UserController::class, 'create']);//Admin
    // Route::put('/update/{id}', [AlbumController::class, 'update']);//Admin
    // Route::delete('/delete/{id}', [AlbumController::class, 'delete']);//Admin
});

/**
 * User
 */
Route::get('/', function () {
    $today = Carbon::today();
    $start = Carbon::now()->setHour(0)->setMinute(0)->setSecond(1);
    $end = Carbon::now()->setHour(23)->setMinute(59)->setSecond(59);
    // $from = Carbon::now('Asia/Tashkent')->startOfHour()->startOfMinute()->startOfSecond();
    // $to = Carbon::now()->endOfHour()->endOfMinute()->endOfSecond();
    // return $today;
    $employees = Employee::whereBetween('birth_date', [$start, $end])->get();
    return $employees;
});

Route::prefix('schools')->group(function () {
    Route::get('/{id}', [SchoolController::class, 'show']);///User
});
Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);//User
});
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']); //User
    Route::get('/{id}', [NewsController::class, 'show']);//User
});
Route::prefix('tags')->group(function () {

});
Route::prefix('positions')->group(function () {
    Route::get('/', [PositionController::class, 'index']);//User
});
Route::prefix('albums')->group(function () {
    Route::get('/', [AlbumController::class, 'index']);//User
    Route::get('/{id}', [AlbumController::class, 'show']);//User
});
Route::prefix('photos')->group(function () {
    Route::get('/', [PhotoController::class, 'index']);//User
    Route::get('/{id}', [PhotoController::class, 'show']);//User
});
Route::prefix('documents')->group(function () {
    Route::get('/', [DocumentController::class, 'index']);//User
    Route::get('show/{id}', [DocumentController::class, 'show']);//User
    Route::get('download/{id}', [DocumentController::class, 'download']);//User
});
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);//User
    Route::get('/{id}', [CategoryController::class, 'show']);//User
});
Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index']);//User
    Route::get('/{id}', [EventController::class, 'show']);//User
});
Route::prefix('files')->group(function () {
    Route::get('/', [FileController::class, 'index']);//User
    Route::get('/{id}', [FileController::class, 'show']);//User
});
