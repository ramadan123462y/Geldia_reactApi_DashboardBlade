<?php

namespace App\Providers;

use App\Core\Dashboard\Repository\Article\ArticleInterface;
use App\Core\Dashboard\Repository\Article\ArticleRepository;
use App\Core\Dashboard\Repository\Banner\BannerInterface;
use App\Core\Dashboard\Repository\Banner\BannerRepository;
use App\Core\Dashboard\Repository\BeforeAfter\BeforeAfterInterface;
use App\Core\Dashboard\Repository\BeforeAfter\BeforeAfterRepository;
use App\Core\Dashboard\Repository\DescreptionArticle\DescreptionArticleInterface;
use App\Core\Dashboard\Repository\DescreptionArticle\DescreptionArticleRepository;
use App\Core\Dashboard\Repository\Gallery\GalleryInterface;
use App\Core\Dashboard\Repository\Gallery\GalleryRepository;
use App\Core\Dashboard\Repository\Slider\SliderInterface;
use App\Core\Dashboard\Repository\Slider\SliderRepository;
use App\Core\Dashboard\Repository\Video\VideoInterface;
use App\Core\Dashboard\Repository\Video\VideoRepository;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind(ArticleInterface::class, ArticleRepository::class);
        app()->bind(BannerInterface::class, BannerRepository::class);
        app()->bind(VideoInterface::class, VideoRepository::class);
        app()->bind(GalleryInterface::class, GalleryRepository::class);
        app()->bind(BeforeAfterInterface::class, BeforeAfterRepository::class);
        app()->bind(DescreptionArticleInterface::class, DescreptionArticleRepository::class);
        app()->bind(SliderInterface::class, SliderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
