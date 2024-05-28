<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stocks;

class StocksController extends Controller
{
    
   public function index()
   {
        $stock1 = Stocks::all();
        if(!$stock1){
            return response()->json(['error'=>"No Stock found"],422);
        }
        return response()->json($stock1,200);
   } 

   public function store(Request $request)
   {
             $stock=Stocks::create([
                'item_code'=> $request->item_code,
                'item_name'=> $request->item_name,
                'cost_price'=> $request->cost_price,
                'quantity'=> $request->quantity,
                'unites'=> $request->unites,
                'selling_price'=> $request->selling_price,
                'stock_in'=> $request->stock_in,
                'reciept'=> $request->reciept_no,
                'expire_date'=> $request->expire_date,
                'item_category'=> $request->item_category,
                'supplier_id'=> $request->supplier_id,
            ]);
        
        if($stock){
            return response()->json(['message'=>"Stock Added sucessfully"],200);
        }
            return response()->json(['error'=>"Failed to add the product"],500);
    }
    public function destory($id){
        $stock = Stocks::find($id);
        if($stock){
            $stock->delete();
            return response()->json(['message'=>"stock deleted"],200);
        }
        return response()->json(['errors'=>"No stock found"],422);
    }

    public function update(Request $request, $id){
        $stocks = Stocks::find($id);
        if($stocks){
            $updates = "nothing";
            if($request->has('item_code')){
                $stocks->item_code = $request->item_code;
                $updates =$update . "item_code";
            }

            if($request->item_name){
                $stocks->item_name = $request->item_name;
                $updates = $updates . " item_name";
            }
            if($request->cost_price){
                $stocks->cost_price = $request->cost_price;
                $updates = $updates . " cost_price";
            }
            if($request->quantity){
                $stocks->quantity = $request->quantity;
                $updates = $updates . "quantity";
            }
            if($request->unites){
                $stocks->unites = $request->unites;
                $updates = $updates . " unites";
            }
            if($request->selling_price){
                $stocks->selling_price = $request->selling_price;
                $updates = $updates . "selling_price";
            }
            if($request->stock_in){
                $stocks->stock_in = $request->stock_in;
                $updates = $updates . "stock_in";
            }
            if($request->reciept){
                $stocks->reciept = $request->reciept;
                $updates = $updates . "reciept";
            }
            if($request->expire_date){
                $stocks->expire_date = $request->expire_date;
                $updates = $updates . "expire_date";
            }
            if($request->item_category){
                $stocks->item_category = $request->item_category;
                $updates = $updates . "item_category";
            }
            if($request->supplier_id){
                $stocks->supplier_id = $request->supplier_id;
                $updates = $updates . "supplier_id";
            }
          
            $stocks->save();
            return response()->json([
                "message" => 'updated '. $updates . ' succesfully.',
            ], 200);
        }else{
            return response()->json([
                "message"=> "suppliers not found",
            ], 404);
        }

    }


}
