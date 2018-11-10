<?php

namespace App\Http\Controllers\web;

use DB;
use Response;
use App\Models\Product;
use App\Models\ImageProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(){
    	return view('admin.product.index');
    }

    public function store(Request $request){

		// dd($request->all());
		
		$request->validate([
			'product' =>'required|max:60',
			'price' =>  'required|min:0',
			'stock' =>  'required|min:0',
			'images.*' => 'required|mimes:jpg,jpeg,png'
		]);

    	 DB::beginTransaction();

    	try{

    		$product = Product::create([
    			'product' => $request->product,
    			'price'  => $request->price,
    			'stock'  => $request->stock,
    			'description'  => $request->description,
			]);
			
			if($request->hasFile('images')){
				$array = [];
				foreach($request->images as $key =>$value){
					$path = $value->store('products');


					$image = [
						'product_id' =>$product->id,
						'image' => $path,

					];

					array_push($array, $image);
				}

				ImageProduct::insert($array);
			}
    		DB::commit();

    	}catch(\Exception $e){

    		DB::rollback();
    		dd($e);
		}
		
		return redirect()->back();

    }


}
