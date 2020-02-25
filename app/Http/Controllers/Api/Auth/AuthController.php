<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(ApiRegisterRequest $request){
        /*
         * @var $user User
         */
        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'type'          => $request->type,
        ]);

        $token = $user->createToken('api_token')->accessToken;
        return response([
            'user_id' => $user->id,
            'access_token' => $token,
        ]);
    }


    public function login(ApiLoginRequest $request){
        $credentials = $request->only(['email','password']);
        $authAttempt = auth()->attempt($credentials);

        if(!$authAttempt){
            return response([ 'error' => 'forbidden', 'message' => 'check your username and password' ], 403);
        }

        $token = auth()->user()->createToken('api_token')->accessToken;
        return response([
            'user_id' => auth()->id(),
            'access_token' => $token,
        ]);
    }

}
