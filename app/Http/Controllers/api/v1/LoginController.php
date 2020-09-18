<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                /** @var User $user **/
                $user = Auth::user();
                $accessToken = $user->createToken("authToken")->accessToken;

                return response(["user" => $user, "accessToken" => $accessToken]);
            }
        } catch (\Exception $exception) {
            return response(["Message" => $exception->getMessage()], 400);
        }
        
        return response(["Message" => "Invalid username or password"], 401);
    }

    public function user() {
        return Auth::user();
    }
}
