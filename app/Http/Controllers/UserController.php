<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $request){

        $data=$request->validate([
            'name' => 'required|string|max:191',
            'type' => 'required|integer|max:1',//owner=1  manager=2  cashier=3
            'email'=> 'required|email|max:191|unique:users,email',
            'password' => 'required|string'

        ]); 

        $user = User::create([
            'name'=>$data['name'],
            'type' =>$data['type'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        return response()->json(['message'=>'User added Successfully'],200);
    }

    public function userList(){

        $users=User::all();
        
        return response()->json(['users'=>$users],200);
    }

    public function getUserbyId($u_id){

        $users=User::find($u_id);

        if($users){
        
        return response()->json($users);
    }
    else{
        return response()->json(['message'=>'No user found'],404);
    }
    }

    public function updateUserbyId(Request $request,$c_id){

        $customers=Customer::find($c_id);

        if($customers){

        $customers->name=$request->input('name');    
        $customers->d_o_b=$request->input('d_o_b');  
        $customers->mobile_number=$request->input('mobile_number');  
        $customers->address=$request->input('address'); 

        $customers->save();

        return response()->json($customers);
        }
        else{
            return response()->json(['message'=>'No customer found'],404);
        }
    }

    public function deleteCustomerbyId(Request $request,$c_id){

        $customers=Customer::find($c_id);

        if($customers){

        $customers->delete();
        
        return response()->json(['message'=>'Successfully Deleted'],200);
        }
        else{
            return response()->json(['message'=>'No item found'],404);
        }
    }
}
