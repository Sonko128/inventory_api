<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Support\Facades\Validator;


class SuppliersController extends Controller
{
    public function index(){
        $supplier = Suppliers::all();
        if(!$supplier){
            return response()->json(['error'=>"No supplier Found"],422);
        }
        return response()->json($supplier, 200);
        
    }
    public function store(Request $request)
    {
                $supplier=Suppliers::create([
                    'supplier_name'=> $request->supplier_name,
                    'business_name'=> $request->business_name,
                    'email'=> $request->email,
                    'supplier_contact'=> $request->supplier_contact,
                    'product_name'=> $request->product_name,
                    'category_name'=> $request->category_name,
                ]);
                if($supplier){
                    return response()->json(['message'=>"Supplier Added sucessfully"],200);
                }
                    return response()->json(['error'=>"Failed to add the supplier"],500);
    }
          
    public function show($item_name)
    {
        $stock=Stock::find($item_name);
        if(!$stock){
            return response()->json(['error'=>"Item Not Found"],422);
        }
        return response()->json($stock,200);
   }

    public function destroy($id){
        $supplier = Suppliers::find($id);
        if($supplier){
            $supplier->delete();
            return response()->json(['message'=>"Supplier deleted"],200);
        }
        return response()->json(['error'=>"deletion failed"],500);
    }

    public function update(Request $request, $id){
        $suppliers = Suppliers::find($id);
        if($suppliers){
            $updates = "nothing";
            if($request->has('supplier_name')){
                $suppliers->supplier_name = $request->supplier_name;
                $updates =$update . "supplier_names";
            }
            if($request->business_name){
                $suppliers->business_name = $request->business_name;
                $updates = $updates . " business_name";
            }
            if($request->email){
                $suppliers->email = $request->email;
                $updates = $updates . " email";
            }
            if($request->supplier_contact){
                $suppliers->supplier_contact = $request->supplier_contact;
                $updates = $updates . "supplier_contact";
            }
            if($request->product_name){
                $suppliers->product_name = $request->product_name;
                $updates = $updates . " product_name";
            }
            if($request->category_name){
                $suppliers->category_name = $request->category_name;
                $updates = $updates . "category_name";
            }
            $suppliers->save();
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
