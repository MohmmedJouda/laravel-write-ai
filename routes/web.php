<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');


Route::group([
    'as' => 'dashboard.',
    'prefix' => 'dashboard/',
], function () {

    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoriesController::class);
});
