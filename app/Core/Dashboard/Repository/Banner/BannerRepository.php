<?php

namespace App\Core\Dashboard\Repository\Banner;

use App\Core\Dashboard\DTO\BannerDto;
use App\Models\Banner;

class BannerRepository implements BannerInterface
{


    public function create(BannerDto $bannerDto)
    {

        Banner::create([


            'image_name' => $bannerDto->getImageName(),
            'article_id' => $bannerDto->getArticleId(),
        ]);
    }
}
