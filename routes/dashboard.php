<?php

use App\Http\Controllers\Dashboard\Articles\ArticleCategorieController;
use App\Http\Controllers\Dashboard\Articles\ArticleController;
use App\Http\Controllers\Dashboard\Articles\ArticleSubCategorieController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SliderController;

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;




Route::prefix('dashboard')->controller(AuthController::class)->group(function () {

    Route::get('/login', 'login')->middleware('guest:admin');
    Route::post('/login-post', 'loginPost');
    Route::get('/logout/{guard}', 'logout');
});
Route::prefix('dashboard')->middleware('isAdmin')->group(function () {

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/contact-email', [ContactController::class, 'index']);
    Route::get('/contact-email/delete/{id}', [ContactController::class, 'delete']);
    Route::prefix('/user')->controller(UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::get('/delete/{id}', 'delete');
        Route::post('/update', 'update');
    });

    Route::prefix('/article-categorie')->controller(ArticleCategorieController::class)->group(function () {

        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::get('/delete/{id}', 'delete');
        Route::post('/update', 'update');
    });

    Route::prefix('/article-subcategorie')->controller(ArticleSubCategorieController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::get('/delete/{id}', 'delete');
        Route::post('/update', 'update');
    });
    Route::prefix('/article')->controller(ArticleController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::get('/edit/{id}', 'edit');

        Route::get('/delete/{id}', 'delete');
        Route::post('/update', 'update');
    });

    Route::prefix('/slider')->controller(SliderController::class)->group(function () {

        Route::get('/', 'index');
        Route::post('/store', 'store');

        Route::post('/update', 'update');

        Route::get('/delete/{id}', 'delete');
    });

    Route::prefix('/setting')->controller(SettingController::class)->group(function () {

        Route::get('/', 'index');
        Route::post('/update-or-create', 'updateOrCreate');
    });
});
