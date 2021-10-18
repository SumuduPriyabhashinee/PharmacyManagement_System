<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function addOrder(Request $request){
        $orders= new Order();

        $orders->item_id=$request->input('item_id');    
        $orders->customer_id=$request->input('customer_id');  
        $orders->selling_price=$request->input('selling_price');  
        $orders->quantity=$request->input('quantity'); 
        
        $orders->save();

        // $items=Item::find($data['customer_id']);

        
        
        // $items->save();

        return response()->json(['orders'=>$orders],200);
    }

    public function orderList(){

        $orders=Order::all();
        
        return response()->json(['orders'=>$orders],200);
    }

    public function getOrderbyId($i_id){

        $orders=Order::find($i_id);

        if($orders){
            return response()->json(['orders'=>$orders],200);
        }
        else{
            return response()->json(['message'=>'No Order found'],404);
        }
        
        
    }

    // public function updateOrderbyId(Request $request,$o_id){

    //     $orders=Order::find($o_id);

    //     if($orders){
    //         $orders->item_id=$request->input('item_id');    
    //         $orders->customer_id=$request->input('customer_id');  
    //         $orders->selling_price=$request->input('selling_price');  
    //         $orders->quantity=$request->input('quantity'); 

    //     $orders->save();

    //     return response()->json(['orders'=>$orders],200);
    // }
    // else{
    //     return response()->json(['message'=>'No Order found'],404);
    // }
    // }

    public function deleteOrderbyId(Request $request,$o_id){

        $orders=Order::find($o_id);
        if($orders){

        $orders->delete();
        
        return response()->json(['message'=>'Successfully Deleted'],200);
        }
        else{
            return response()->json(['message'=>'No Order found'],404);
        }
    }
}
