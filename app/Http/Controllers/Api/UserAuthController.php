<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserAuthInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    private $UserAuthRepository;

    public function __construct(UserAuthInterface $UserAuthRepository)
    {
        $this->UserAuthRepository = $UserAuthRepository;
    }

    public function register(UserStoreRequest $request)
    {
        $parms = $request->all();
        return $this->UserAuthRepository->store($parms);
    }

    public function login(UserLoginRequest $request)
    {
        $parms = $request->all();
        return $this->UserAuthRepository->login($parms);
    }

    public function logout(Request $request)
    {
        $parms = $request->all();
        return $this->UserAuthRepository->logout($parms);
    }

    public function show(Request $request)
    {
        $parms = $request->all();
        return $this->UserAuthRepository->show($parms);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $parms = $request->all();
        return $this->UserAuthRepository->update($parms, $user);
    }

    public function tokenValidate()
    {
        return response()->json(['status' => 'Success', "message" => "Token is valid!"], 200);
    }
}
