<?php

namespace App\Core\Dashboard\DTO;


class ArticleDto
{


    public $title, $isNew, $imageFile, $articleSubCategorieId, $userId, $imageName, $mostFamous, $homePage;

    public function __construct($title, $isNew, $imageFile, $articleSubCategorieId, $userId, $imageName, $mostFamous, $homePage)
    {

        $this->title = $title;
        $this->isNew = $isNew;
        $this->imageFile = $imageFile;
        $this->articleSubCategorieId = $articleSubCategorieId;
        $this->userId = $userId;
        $this->imageName = $imageName;
        $this->mostFamous = $mostFamous;
        $this->homePage = $homePage;
    }

    public function getMostFamous()
    {

        return $this->mostFamous;
    }

    public function getHomePage()
    {


        return $this->homePage;
    }



    public function getTitle()
    {

        return $this->title;
    }

    public function getIsNew()
    {

        return $this->isNew;
    }

    public function getImageFile()
    {

        return $this->imageFile;
    }

    public function getImageName()
    {

        return $this->imageName;
    }

    public function getArticleSubCategorieId()
    {

        return $this->articleSubCategorieId;
    }

    public function getUserId()
    {

        return $this->userId;
    }
}
