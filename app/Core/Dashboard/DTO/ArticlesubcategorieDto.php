<?php

namespace App\Core\Dashboard\DTO;

use App\Http\Requests\ArticleSubCategorieRequest;



class ArticlesubcategorieDto
{


    public $name, $articlecategorieId, $imageName, $descreption, $imageFile;

    public function __construct($name, $articlecategorieId, $imageName, $descreption, $imageFile)
    {

        $this->name = $name;
        $this->articlecategorieId = $articlecategorieId;
        $this->imageName = $imageName;
        $this->descreption = $descreption;
        $this->imageFile = $imageFile;
    }

    public function getDescreption()
    {


        return $this->descreption;
    }

    public function getName()
    {


        return $this->name;
    }

    public function getArticleCategorieId()
    {


        return $this->articlecategorieId;
    }

    public function getImageName()
    {


        return $this->imageName;
    }

    public function getImageFile()
    {

        return $this->imageFile;
    }
}
