<?php

namespace App\Core\Dashboard\DTO;


class BannerDto
{

    public $imageName, $articleId, $imageFile;

    public function __construct($imageName, $articleId, $imageFile)
    {

        $this->imageName = $imageName;
        $this->articleId = $articleId;
        $this->imageFile = $imageFile;
    }

    public function getImageName()
    {

        return $this->imageName;
    }

    public function getArticleId()
    {


        return $this->articleId;
    }

    public function getImageFile()
    {


        return $this->imageFile;
    }
}
