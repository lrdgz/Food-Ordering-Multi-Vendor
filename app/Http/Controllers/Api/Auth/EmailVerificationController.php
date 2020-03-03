<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller{

    public function verify( $token ){
        //TODO: find the user account that has that token
        $user = User::where(['email_token' => $token])->first();

        if(!$user){
            return response([
                'message' => 'User not found.'
            ], 404);
        }

        //TODO: if exists then we verify the email
        $user->verified_email = true;
        $user->email_token = null;
        $user->save();
        return response([
            'message' => 'Thank you your email is verified.'
        ], 200);
    }

}
