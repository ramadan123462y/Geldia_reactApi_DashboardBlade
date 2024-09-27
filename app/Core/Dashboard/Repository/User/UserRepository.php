<?php

namespace App\Core\Dashboard\Repository\User;

use App\Core\Dashboard\DTO\UserDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{

    public function allPaginate($paginate)
    {
        return  User::paginate($paginate);
    }

    public function store(UserDto $userDto)
    {


        User::create([

            "name" => $userDto->getName(),
            "email" => $userDto->getEmail(),
            "password" => Hash::make($userDto->getPassword()),
            "phone_number" => $userDto->getPhoneNumber(),
            "phone_number" => $userDto->getPhoneNumber(),
            'image_name' => $userDto->getImageName(),

        ]);
    }

    public function findById($id)
    {


        return User::findorfail($id);
    }

    public function deleteById($id)
    {


        $this->findById($id)->delete();
    }

    public function updateById($id, $dataUser)
    {


        $this->findById($id)->update($dataUser);
    }

    public function getIdAndName()
    {

        return  User::get(['id', 'name']);
    }
}
