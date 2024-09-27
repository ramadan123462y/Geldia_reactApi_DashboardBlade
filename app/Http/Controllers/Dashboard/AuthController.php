<?php

namespace App\Http\Controllers\Dashboard;

use App\Core\Dashboard\DTO\AdminDto;
use App\Core\Dashboard\Service\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminauthRequest;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $authService;
    public function __construct(AuthService $authService)
    {

        $this->authService = $authService;
    }

    public function login()
    {

        return view('Dashboard.login');
    }

    public function loginPost(AdminauthRequest $request, AdminDto $adminDto)
    {

        if ($this->authService->check('admin', $adminDto)) {

            return redirect('dashboard/home');
        }

        return redirect('dashboard/login')->withErrors('Email Or Password Not Corrected');
    }

    public function logout($guard)
    {

        $this->authService->logout('admin');

        return redirect('dashboard/login');
    }
}
