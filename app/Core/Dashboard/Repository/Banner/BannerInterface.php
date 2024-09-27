<?php

namespace App\Core\Dashboard\Repository\Banner;

use App\Core\Dashboard\DTO\BannerDto;


interface BannerInterface
{



    public function create(BannerDto $bannerDto);
}
