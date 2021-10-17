<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){

        $data=$request->validate([
            'name' => 'required|string|max:191',
            'type' => 'required|integer|max:1',
            'email'=> 'required|email|max:191|unique:users,email',
            'password' => 'required|string'

        ]); 

        $user = User::create([
            'name'=>$data['name'],
            'type' =>$data['type'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        $token= $user->createToken('fundaProjectToken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response(['message'=>'Logged out Successfully.']);
    }

    public function login(Request $request){


        $data=$request->validate([
            // 'name' => 'required|string|max:191',
            'email'=> 'required|email|max:191',
            'password' => 'required|string',

        ]); 
        $user=User::where('email',$data['email'])->first();

        // if($type==$data.type)
         
        if(!$user||!Hash::check($data['password'],$user->password))
        { 
            return response(['message'=>'Invalid Credenials'],401);
        }
        else
        {
            $token= $user->createToken('fundaProjectTokenLogin')->plainTextToken;
            $response = [
                'user'=>$user,
                'token'=>$token
            ];
    
            return response($response,200);
        }
    }
}
