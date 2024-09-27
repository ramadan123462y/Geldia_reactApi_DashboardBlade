<?php

namespace App\Core\Dashboard\Repository\Gallery;

use App\Core\Dashboard\DTO\GalleryDto;

interface GalleryInterface
{

    public function create(GalleryDto $galleryDto);
}
