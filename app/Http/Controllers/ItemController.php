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

        return response()->json($items);
    }

    public function itemList(){

        $items=Item::all();
        
        return response()->json($items);
    }

    public function getItembyId($i_id){

        $items=Item::find($i_id);
        
        return response()->json($items);
    }

    public function updateItembyId(Request $request,$i_id){

        $items=Item::find($i_id);

        $items->name=$request->input('name');    
        $items->price=$request->input('price');  
        $items->amount=$request->input('amount');  
        $items->reorder_level=$request->input('reorder_level'); 
        
        $items->save();

        return response()->json($items);
    }

    public function deleteItembyId(Request $request,$i_id){

        $items=Item::find($i_id);

        $items->delete();
        
        return response()->json($items);
    }
}
