<?php

namespace App\Http\Service\Auth;

use App\Repository\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($params)
    {
        $password = Hash::make($params['password']);
        $user = $this->userRepository->create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => $password
        ]);

        return response()->json(['success' => true] ,200 );
    }
}
