<?php

namespace App\Core\Dashboard\DTO;





class GalleryDto
{


    public $imageFile, $articleId, $imageName;

    public function __construct($imageFile, $articleId, $imageName)
    {
        $this->imageFile = $imageFile;
        $this->articleId = $articleId;
        $this->imageName = $imageName;
    }

    public function getImageFile()
    {

        return $this->imageFile;
    }

    public function getArticleId()
    {


        return $this->articleId;
    }

    public function getImageName()
    {

        return $this->imageName;
    }
}
