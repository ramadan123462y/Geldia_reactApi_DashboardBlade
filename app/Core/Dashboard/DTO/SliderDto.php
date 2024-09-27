<?php

namespace App\Core\Dashboard\DTO;


class SliderDto
{

    public $imageName, $imageFile;



    public function __construct($imageName, $imageFile)
    {

        $this->imageName = $imageName;
        $this->imageFile = $imageFile;
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
