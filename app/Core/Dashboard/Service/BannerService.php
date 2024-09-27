<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\BannerDto;
use App\Core\Dashboard\Repository\Banner\BannerInterface;
use App\Core\Trait\FileTrait;

class BannerService
{
    use FileTrait;

    public $bannerInterface;
    public function __construct(BannerInterface $bannerInterface)
    {


        $this->bannerInterface = $bannerInterface;
    }

    public function  create(BannerDto $bannerDto)
    {

        $this->bannerInterface->create($bannerDto);

        FileTrait::uploade($bannerDto->getImageFile(), $bannerDto->getImageName(), 'Articles/Banners', 'uploades');
    }
}
