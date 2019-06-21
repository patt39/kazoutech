<?php

namespace App\Http\Controllers\Auth;

use App\Model\user\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            //'name' => ['required', 'string', 'max:255'],
            //'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password' => ['required', 'string'],
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user,'access_token' => $accessToken]);
    }



    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)){
            return ['message' => 'Data invalid'];
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(),'access_token' => $accessToken]);
    }
}
