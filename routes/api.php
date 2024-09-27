<?php

use App\Http\Controllers\Api\ArticleApiController;
use App\Http\Controllers\Api\ArticleCategorieApiController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\SettingApiController;
use App\Http\Controllers\Api\SliderApiController;
use App\Http\Controllers\Api\SubCategorieApiController;
use App\Http\Controllers\Api\VideoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;








Route::prefix('article')->group(function () {
    Route::get('/find/{articleId}', [ArticleApiController::class, 'find']);
    Route::get('/related/{articleId}', [ArticleApiController::class, 'related']);
    Route::get('/writers/{articleId}', [ArticleApiController::class, 'writers']);
    Route::get('/getByTitle', [ArticleApiController::class, 'getByTitle']);
    Route::get('/filter-by-categorie-and-subCategorie', [ArticleApiController::class, 'filterByCategorieAndSubCategorie']);


    Route::get('/home-page', [ArticleApiController::class, 'getArticleHomePage']);


    Route::prefix('/categorie')->controller(ArticleCategorieApiController::class)->group(function () {
        Route::get('/all', 'all');

        Route::get('/subcategories', 'getArticleSubCategories');
    });
});

Route::get('/subcategorie/articles', [SubCategorieApiController::class, 'getArticles']);

Route::get('/videos/home-page', [VideoApiController::class, 'getHomePage']);

Route::get('/slider/get', [SliderApiController::class, 'get']);

Route::post('contact/sendMail', [ContactController::class, 'sendMail']);

Route::get('/get-categories-and-subcategorie', [ArticleCategorieApiController::class, 'getCategoriesAndSubCategorie']);
Route::get('/settings', [SettingApiController::class, 'get']);

