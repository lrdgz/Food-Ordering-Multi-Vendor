<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class VendorController extends Controller{


    public function __construct()
    {
        $this->middleware(['auth:api', 'verified_email']);
    }

    public function show( $vendor ){
        return new UserResource( User::find( $vendor ) );
    }

}
