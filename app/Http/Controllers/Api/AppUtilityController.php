<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Utility;
use Illuminate\Http\Request;

class AppUtilityController extends Controller
{
    public function appUrl(){

        $utility = Utility::where(['key' => 'app_url'])->first();

        if(!$utility){
            return response([
                'app_url' => 'not available.'
            ], 404);
        }

        return response([
            'app_url' => $utility->value,
        ], 200);

    }

    public function email(Request $request){
        $user = User::where(['email' => $request->email])->first();
        if(!$user){
            return response([
                'message' => 'Email is not in database.'
            ], 404);
        }

        return response([
            'message' => 'Email is in database.'
        ], 200);
    }
}
