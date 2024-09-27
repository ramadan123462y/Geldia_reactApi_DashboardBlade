<?php

namespace App\Core\Dashboard\DTO;

use Illuminate\Http\Request;

class AdminDto
{

    public $email;
    public $password;

    public function __construct(Request $request)
    {

        $this->email = $request->email;
        $this->password = $request->password;
    }

    public function getEmail()
    {


        return $this->email;
    }

    public function getPassword()
    {

        return $this->password;
    }
}
