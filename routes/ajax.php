<?php

use App\Http\Controllers\Dashboard\Articles\ArticleController;
use Illuminate\Support\Facades\Route;


Route::prefix('dashboard/article')->controller(ArticleController::class)->group(function () {
    Route::post('/upload-image', 'uploadeImageDescreption')->name('upload.image');
});
