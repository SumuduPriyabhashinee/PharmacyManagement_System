<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function addCustomer(Request $request){
        $customers= new Customer();

        $customers->name=$request->input('name');    
        $customers->d_o_b=$request->input('d_o_b');  
        $customers->mobile_number=$request->input('mobile_number');  
        $customers->address=$request->input('address'); 
        
        $customers->save();

        return response()->json($customers);
    }

    public function customerList(){

        $customers=Customer::all();
        
        return response()->json($customers);
    }

    public function getCustomerbyId($c_id){

        $customers=Customer::find($c_id);
        
        return response()->json($customers);
    }

    public function updateCustomerbyId(Request $request,$c_id){

        $customers=Customer::find($c_id);

        $customers->name=$request->input('name');    
        $customers->d_o_b=$request->input('d_o_b');  
        $customers->mobile_number=$request->input('mobile_number');  
        $customers->address=$request->input('address'); 

        $customers->save();

        return response()->json($customers);
    }

    public function deleteCustomerbyId(Request $request,$c_id){

        $customers=Customer::find($c_id);

        $customers->delete();
        
        return response()->json($customers);
    }
}
