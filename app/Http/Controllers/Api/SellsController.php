<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellsController extends Controller
{
    public function index(){
        $sales = Sells::all();
        if(!$sales){
            return response()->json([
                'error'=>"No sales"
            ],422);
        }
        return response()->json($sales ,200);
    }

    public function store(Request $request){
        $sales = Sells::create([
        'product_id'=>$request->product_id,
        'product_code'=>$request->product_code,
        'product_name'=>$request->product_name,
        'quantity'=>$request->quantity,
        'unites'=>$request->unites,
        'selling_price'=>$request->selling_price,
        'stock_in'=>$request->stock_in,
        'product_category'=>$request->product_category,
        'reciept_no'=>$request->reciept_no,
        'user_id'=>$request->user_id,
        ]);
        if($sales){
            return response()->json([
              'message'=>"Sell made"
            ],200);
        }
        return response()->json([
            'error'=>"Sell failed"
        ],500);
    }
}
