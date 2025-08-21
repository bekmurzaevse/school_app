<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\v1\AlbumController;
use App\Http\Controllers\v1\ClubController;
use App\Http\Controllers\v1\FaqController;
use App\Http\Controllers\v1\HistoryController;
use App\Http\Controllers\v1\DocumentController;
use App\Http\Controllers\v1\PositionController;
use App\Http\Controllers\v1\NewsController;
use App\Http\Controllers\v1\RuleController;
use App\Http\Controllers\v1\ScheduleController;
use App\Http\Controllers\v1\SchoolController;
use App\Http\Controllers\v1\EmployeeController;
use App\Http\Controllers\v1\InformationController;
use App\Http\Controllers\v1\SchoolHourController;
use App\Http\Controllers\v1\TagController;
use App\Http\Controllers\v1\TargetController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\VacancyController;
use App\Http\Controllers\v1\ValueController;
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
 * User Logout
 */
Route::middleware(['auth:sanctum', 'ability:access-token'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', [UserController::class, 'logout']);
    });
});

/**
 * Admin
 */
Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('role:admin')->group(function () {
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

        Route::prefix('documents')->group(function () {
            Route::post('upload', [DocumentController::class, 'upload']);
            Route::put('update/{id}', [DocumentController::class, 'update']);
            Route::delete('delete/{id}', [DocumentController::class, 'delete']);
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

        Route::prefix('targets')->group(function () {
            Route::post('/create', [TargetController::class, 'create']);
            Route::put('/update/{id}', [TargetController::class, 'update']);
            Route::delete('/delete/{id}', [TargetController::class, 'delete']);
        });

        Route::prefix('histories')->group(function () {
            Route::post('/create', [HistoryController::class, 'create']);
            Route::put('/update/{id}', [HistoryController::class, 'update']);
            Route::delete('/delete/{id}', [HistoryController::class, 'delete']);
        });

        Route::prefix('school-hours')->group(function () {
            Route::post('/create', [SchoolHourController::class, 'create']);
            Route::put('/update/{id}', [SchoolHourController::class, 'update']);
            Route::delete('/delete/{id}', [SchoolHourController::class, 'delete']);
        });

        Route::prefix('rules')->group(function () {
            Route::post('create', [RuleController::class, 'create']);
            Route::put('update/{id}', [RuleController::class, 'update']);
            Route::delete('delete/{id}', [RuleController::class, 'delete']);
        });

        Route::prefix('values')->group(function () {
            Route::post('create', [ValueController::class, 'create']);
            Route::put('update/{id}', [ValueController::class, 'update']);
            Route::delete('delete/{id}', [ValueController::class, 'delete']);
        });

        Route::prefix('clubs')->group(function () {
            Route::post('create', [ClubController::class, 'create']);
            Route::put('update/{id}', [ClubController::class, 'update']);
            Route::delete('delete/{id}', [ClubController::class, 'delete']);
        });

        Route::prefix('informations')->group(function () {
            Route::post('/create', [InformationController::class, 'create']);
            Route::put('/update/{id}', [InformationController::class, 'update']);
            Route::delete('/delete/{id}', [InformationController::class, 'delete']);
        });

        Route::prefix('vacancies')->group(function () {
            Route::post('/create', [VacancyController::class, 'create']);
            Route::put('/update/{id}', [VacancyController::class, 'update']);
            Route::delete('/delete/{id}', [VacancyController::class, 'delete']);
        });

        Route::prefix('schedules')->group(function () {
            Route::get('/all', [ScheduleController::class, 'indexAll']); //for admin
            Route::post('/create', [ScheduleController::class, 'create']);
            Route::put('/update/{id}', [ScheduleController::class, 'update']);
            Route::delete('/delete/{id}', [ScheduleController::class, 'delete']);
        });
    });
});

// Main
Route::prefix('main')->group(function () {
    Route::get('/about', [MainController::class, 'about']);
    Route::get('/education', [MainController::class, 'education']);
    Route::get('/schedule', [MainController::class, 'schedules']);
});

/**
 *  Index page
 */
Route::get('/', [MainController::class, 'index']);

Route::prefix('rules')->group(function () {
    Route::get('/', [RuleController::class, 'index']);
    Route::get('/{id}', [RuleController::class, 'show']);
});

Route::prefix('values')->group(function () {
    Route::get('/', [ValueController::class, 'index']);
    Route::get('/{id}', [ValueController::class, 'show']);
});

Route::prefix('clubs')->group(function () {
    Route::get('/', [ClubController::class, 'index']);
    Route::get('/{id}', [ClubController::class, 'show']);
});

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

Route::prefix('documents')->group(function () {
    Route::get('/', [DocumentController::class, 'index']);
    Route::get('show/{id}', [DocumentController::class, 'show']);
    Route::get('download/{id}', [DocumentController::class, 'download']);
});

Route::prefix('faqs')->group(function () {
    Route::get('/', [FaqController::class, 'index']);
    Route::get('/{id}', [FaqController::class, 'show']);
});

Route::prefix('targets')->group(function () {
    Route::get('/', [TargetController::class, 'index']);
    Route::get('/{id}', [TargetController::class, 'show']);
});

Route::prefix('histories')->group(function () {
    Route::get('/', [HistoryController::class, 'index']);
    Route::get('/{id}', [HistoryController::class, 'show']);
});

Route::prefix('school-hours')->group(function () {
    Route::get('/', [SchoolHourController::class, 'index']);
    Route::get('/{id}', [SchoolHourController::class, 'show']);
});

Route::prefix('informations')->group(function () {
    Route::get('/', [InformationController::class, 'index']);
    Route::get('/{id}', [InformationController::class, 'show']);
});

Route::prefix('vacancies')->group(function () {
    Route::get('/', [VacancyController::class, 'index']);
    Route::get('/{id}', [VacancyController::class, 'show']);
});

Route::prefix('schedules')->group(function () {
    Route::get('/', [ScheduleController::class, 'index']);
    Route::get('/{id}', [ScheduleController::class, 'show']);
    Route::get('/download/{id}', [ScheduleController::class, 'download']);
});
