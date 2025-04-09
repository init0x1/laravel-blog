<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Requests\API\LoginRequest;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $newUser =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $newUser->createToken($newUser->email)->plainTextToken;

        return response()->json([
            "user"=>new UserResource($newUser),
            "token"=>$token,
        ],201);


    }

    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                "message"=>"invalid email or password",
            ],401);
        }

        $token = $user->createToken($user->email)->plainTextToken;
        return response()->json([
            "user"=>new UserResource($user),
            "token"=>$token,
        ],200);

    }

}
