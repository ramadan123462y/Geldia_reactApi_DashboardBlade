<?php

namespace App\Core\Dashboard\Repository\Gallery;

use App\Core\Dashboard\DTO\GalleryDto;
use App\Models\Gallery;

class GalleryRepository implements GalleryInterface
{



    public function create(GalleryDto $galleryDto)
    {

        Gallery::create([

            'image_file' => $galleryDto->getImageName(),
            'article_id' => $galleryDto->getArticleId(),
        ]);
    }
}
