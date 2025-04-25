<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Cache::remember('test', 600, function () {
        return "kfjdslkjfksdfjsklfjsklfjklsdjfksdfjsklf";
    });
    return view('welcome');
});
