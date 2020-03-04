<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiChangePasswordRequest;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRecoverPasswordRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Resources\UserResource;
use App\Mail\NewUserRegistered;
use App\Mail\UserPasswordPin;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    private $CLIENT_ID = 2;
    private $CLIENT_SECRET = 'EE15n3EinJlv5DHZqDbtiltDcrEngyKEndod4Ud3';

    private $unwantedPins = [
        111111,222222,333333,
        444444,555555,666666,
        777777,888888,999999
    ];

    private function inUnWanted($pin){
        return in_array( $pin, $this->unwantedPins );
    }

    public function register(ApiRegisterRequest $request){
        $token = bin2hex( openssl_random_pseudo_bytes( 30 ) );

        /*
         * @var $user User
         */
        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'type'          => $request->type,
            'email_token'   => $token,
        ]);

        Mail::to( $user )->queue( new NewUserRegistered($token) );

        $http = new Client();
        $response = $http->post('http://foodordering.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id'  => $this->CLIENT_ID,
                'client_secret' => $this->CLIENT_SECRET,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }


    public function login(ApiLoginRequest $request){
        $credentials = $request->only(['email','password']);
        $authAttempt = auth()->attempt($credentials);

        if(!$authAttempt){
            return response([ 'error' => 'forbidden', 'message' => 'check your username and password' ], 403);
        }

        $http = new Client();
        $response = $http->post('http://foodordering.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id'  => $this->CLIENT_ID,
                'client_secret' => $this->CLIENT_SECRET,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }


    public function recover(ApiRecoverPasswordRequest $request){
       //TODO: Check if email exists
        $user = User::where(['email' => $request->email])->first();
        if (is_null($user)){
            return response([
                'error' => 'email does match our records'
            ], 404);
        }

       //TODO: Send the recover password to link that email
        $pin = rand(111111, 999999);
        foreach ($this->unwantedPins as $unwantedPin){
            if ($pin == $unwantedPin){
                $pin = rand(111111, 999999);
            }
        }

        $user->pin = $pin;
        $user->save();

        Mail::to($user)->queue( new UserPasswordPin( $pin ) );

        return response(['message' => 'a six digit pin number has been sent to your email address'], 200);
    }


    public function change(ApiChangePasswordRequest $request){
        //TODO: Find user by pin
        $user = User::where(['pin' => $request->pin])->first();
        if (is_null($user)){
            return response([
                'error' => 'user pin incorrect'
            ], 404);
        }

        //TODO: Change the password wit the new one
        $user->password = Hash::make( $request->password );
        $user->pin = null;
        $user->save();

        return response([
            'message' => 'Please login with your new password'
        ], 200);
    }

}
