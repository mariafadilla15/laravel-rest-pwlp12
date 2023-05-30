<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Http\Requests\RegisterRequest;

class ApiAuthController extends Controller
{
    public function login(LoginRequest $request){
        //check apakah data user yang diinput ada
        $user= User::where('username',$request->username)->first();

        //check password
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'user atau password salah'
            ],401);
        }

        //generate token 
        $token =$user->createToken('token')->plainTextToken;

        // return response()->json([
        //     'message'=>'success login',
        //     'user'=>$user,
        //     'token'=>$token,
        // ],200);

        return new LoginResource([
            'message'=>'success login',
            'user'=>$user,
            'token'=>$token,
        ],200);
    }

    //JS 13 - Praktikum 2
    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->noContent();
    }

    //JS 13 - Praktikum 3
    public function register(RegisterRequest $request){

        $user=User::create([
            'username'=>$request->username,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token=$user->createToken('token')->plainTextToken;

        return new LoginResource([
            'message'=>'succes login',
            'user'=>$user,
            'token'=>$token,
        ],200);
    }
}
