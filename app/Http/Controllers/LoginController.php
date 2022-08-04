<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        // dd($credentials);

        // $user = $this->userRepo->findByEmail($credentials['email']);

        // if (Hash::check($credentials['password'], $user->password) === false) {
        //     return response()->json('Desautorizado', 401);
        // }


        if (Auth::attempt($credentials) === false) {
            return response()->json('Desautorizado', 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('token', ['series:delete']);

        return response()->json($token->plainTextToken);
    }
}
