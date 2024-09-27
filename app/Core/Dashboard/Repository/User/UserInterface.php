<?php

namespace App\Core\Dashboard\Repository\User;

use App\Core\Dashboard\DTO\UserDto;

interface UserInterface
{

    public function allPaginate($paginate);
    public function store(UserDto $userDto);
    public function findById($id);
    public function deleteById($id);
    public function updateById($id, $dataUser);
}
