<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Requests\registerrequest;
use App\Http\Requests\loginrequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthControllers extends Controller
{


    public function login(loginrequest $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = Auth::User();
            $success['token'] = $user->createtoken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'user logged in'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,

                'message' => 'user not authorised',
            ];
            return response()->json($response, 400);
        }
    }
    public function register(registerrequest $request)
    {


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createtoken('MyApp')->plainTextToken;
        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'user added'
        ];
        // return $this->succes(['data' => $user, 'token' => $success['token'],]);
        return response()->json($response, 200);
    }
    public function logout(Auth $auth)
    {
        // $bolean = Auth::user()->currentAccessToken->delete();
        $user = Auth::user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return ("you looged out");
    }
}
