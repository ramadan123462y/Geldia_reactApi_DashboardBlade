<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\GalleryDto;
use App\Core\Dashboard\Repository\Gallery\GalleryInterface;
use App\Core\Trait\FileTrait;

class GalleryService
{
    public $galleryInterface;
    use FileTrait;


    public function __construct(GalleryInterface $galleryInterface)
    {


        $this->galleryInterface = $galleryInterface;
    }

    public function create(GalleryDto $galleryDto)
    {

        $this->galleryInterface->create($galleryDto);
        FileTrait::uploade($galleryDto->getImageFile(), $galleryDto->getImageName(), 'Articles/Galleryes', 'uploades');
    }
}
