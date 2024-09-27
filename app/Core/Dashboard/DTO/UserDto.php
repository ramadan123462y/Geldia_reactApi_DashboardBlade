<?php

namespace App\Core\Dashboard\DTO;

use Illuminate\Http\Request;

class UserDto
{


    public $name, $email, $password, $phoneNumber, $imageFile, $imageName;

    public function __construct($name, $email, $password, $phoneNumber, $imageFile, $imageName)
    {

        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->imageFile = $imageFile;
        $this->imageName = $imageName;
    }
    public function getName()
    {


        return $this->name;
    }

    public function getEmail()
    {

        return $this->email;
    }

    public function getPassword()
    {


        return $this->password;
    }

    public function getPhoneNumber()
    {

        return $this->phoneNumber;
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
