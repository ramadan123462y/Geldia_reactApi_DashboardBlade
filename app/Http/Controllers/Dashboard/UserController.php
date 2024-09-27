<?php

namespace App\Http\Controllers\Dashboard;

use App\Core\Dashboard\DTO\UserDto;
use App\Core\Dashboard\Repository\User\UserRepository;
use App\Core\Dashboard\Service\UserService;
use App\Core\Trait\FileTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $userService;
    use FileTrait;
    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
    }
    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->allPaginate(5);

        return view('Dashboard.pages.Users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {

        $this->userService->store($request);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: User Created.');
        return redirect()->back();
    }

    public function delete($id)
    {

        $this->userService->deleteById($id);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: User Deleted.');
        return redirect()->back();
    }

    public function update(Request $request)
    {

        $this->userService->updateById( $request);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->success('Sucessfully: User Updated Sucessfully.');
        return redirect('dashboard/user');
    }
}
