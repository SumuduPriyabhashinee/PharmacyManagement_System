<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function addItem(Request $request){
        $items= new Item();

        $items->name=$request->input('name');    
        $items->price=$request->input('price');  
        $items->amount=$request->input('amount');  
        $items->reorder_level=$request->input('reorder_level'); 
        
        $items->save();

        return response()->json(['items'=>$items],200);
    }

    public function itemList(){

        $items=Item::all();
        
        return response()->json(['items'=>$items],200);
    }

    public function getItembyId($i_id){

        $items=Item::find($i_id);

        if($items){
            return response()->json(['items'=>$items],200);
        }
        else{
            return response()->json(['message'=>'No item found'],404);
        }
        
        
    }

    public function updateItembyId(Request $request,$i_id){

        $items=Item::find($i_id);

        if($items){
        $items->name=$request->input('name');    
        $items->price=$request->input('price');  
        $items->amount=$request->input('amount');  
        $items->reorder_level=$request->input('reorder_level'); 
        
        $items->save();

        return response()->json(['items'=>$items],200);
    }
    else{
        return response()->json(['message'=>'No item found'],404);
    }
    }

    public function deleteItembyId(Request $request,$i_id){

        $items=Item::find($i_id);
        if($items){

        $items->delete();
        
        return response()->json(['message'=>'Successfully Deleted'],200);
        }
        else{
            return response()->json(['message'=>'No item found'],404);
        }
    }
}
