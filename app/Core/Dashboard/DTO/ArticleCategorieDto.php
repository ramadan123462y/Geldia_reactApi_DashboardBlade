<?php

namespace App\Core\Dashboard\DTO;

use App\Http\Requests\ArticleCategorieRequest;
use Illuminate\Http\Request;

class ArticleCategorieDto
{

    public $name, $imageName, $imageFile;

    public function __construct($name, $imageName, $imageFile)
    {
        $this->name = $name;
        $this->imageName = $imageName;
        $this->imageFile = $imageFile;
    }

    public function getName()
    {


        return $this->name;
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
