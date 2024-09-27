<?php

namespace App\Core\Dashboard\DTO;




class BeforeAfterDto
{

    public $imageBeforeFile, $imageAfterFile, $articleId, $imageBeforeName, $imageAfterName;

    public function __construct($imageBeforeFile, $imageAfterFile, $articleId, $imageBeforeName, $imageAfterName)
    {

        $this->imageBeforeFile = $imageBeforeFile;
        $this->imageAfterFile = $imageAfterFile;
        $this->articleId = $articleId;
        $this->imageBeforeName = $imageBeforeName;
        $this->imageAfterName = $imageAfterName;
    }

    public function getImageBeforeFile()
    {


        return $this->imageBeforeFile;
    }

    public function getImageAfterFile()
    {


        return $this->imageAfterFile;
    }
    public function getImageAfterName()
    {
        return $this->imageAfterName;
    }

    public function getImageBeforeName()
    {

        return $this->imageBeforeName;
    }


    public function getArticleId()
    {

        return $this->articleId;
    }
}
