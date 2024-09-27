<?php

namespace App\Core\Dashboard\Service;

use App\Core\Dashboard\DTO\UserDto;
use App\Core\Dashboard\Repository\User\UserRepository;
use App\Core\Trait\FileTrait;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public $userRepository;
    use FileTrait;
    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    public function store(UserRequest $request)
    {


        $userDto = $this->handleUserDto($request);

        $this->userRepository->store($userDto);

        FileTrait::uploade($userDto->getImageFile(), $userDto->getImageName(), 'Users', 'uploades');
    }

    private function handleUserDto($request)
    {

        $imageName = null;

        if ($request->hasFile('image_name')) {

            $imageName = Str::uuid() . '.' .  $request->file('image_name')->getClientOriginalExtension();
        }

        return new UserDto(
            $request->name,
            $request->email,
            $request->password,
            $request->phone_number,
            $request->file('image_name'),
            $imageName
        );
    }

    public function deleteById($id)
    {


        $this->userRepository->deleteById($id);
    }

    public function updateById($request)
    {
        $userDto = $this->handleUserDto($request);

        $dataUser = $this->handleDataUser($userDto);

        $this->userRepository->updateById($request->id_user, $dataUser);


        if ($request->hasFile('image_name')) {
            $imageName = $this->userRepository->findById($request->id_user)->image_name;
            FileTrait::delete(public_path("Backend\Uploades\Users\\$imageName"));

            FileTrait::uploade($userDto->getImageFile(), $userDto->getImageName(), 'Users', 'uploades');
        }
    }

    private function handleDataUser($userDto)
    {

        $dataUser = [
            'name' => $userDto->getName(),
            'email' => $userDto->getEmail(),
            'phone_number' => $userDto->getPhoneNumber(),

        ];

        if (isset($userDto->password)) {

            $dataUser['password'] = Hash::make($userDto->getPassword());
        }
        if ($userDto->imageName) {


            $dataUser['image_name'] =  $userDto->getImageName();
        }
        return $dataUser;
    }
}
