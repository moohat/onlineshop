<?php

namespace App\Http\Controllers\web;

use DB;
use Response;
use Storage;
use App\Models\Product;
use App\Models\ImageProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{
    public function index(){

      $products = Product::orderBy('product','asc')->paginate(15);
      return view('admin.product.index', compact('products'));
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

public function show($id){
  $product = Product::with('imageRelation')->where('id',$id)->first();

		//dd($product);

  return view('admin.product.detail',compact('product'));

}


public function update(Request $request){
  $product =  Product::where('id', $request->id)->first();

  $oldImagesProduct = ImageProduct::where('product_id',$request->id)->get();

  DB::beginTransaction();

  try{
     $product->update([
        'product' => $request->product,
        'price'  => $request->price,
        'stock'  => $request->stock,
        'description'  => $request->description,
    ]);


     if( $request->hasFile('images') ){

                //hapus gambar lama
        if( count($oldImagesProduct) >=0){
            foreach ($oldImagesProduct as $old) {
                Storage::delete($old->image);
            }

            ImageProduct::where('product_id',$request->id)->delete();
        }

                //insert data image baru
        $array = [];
        foreach($request->images as $key =>$value){
            $path = $value->store('products');


            $image = [
                'product_id' =>$request->id,
                'image' => $path,

            ];

            array_push($array, $image);
        }

        ImageProduct::insert($array);




    }


    DB::commit();
}catch(\Exception $e){
 //dd($e);
 DB::rollback();
}
return redirect()->back();
}



}
