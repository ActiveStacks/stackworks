<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Session;

class PagesController extends Controller {


    public function home() {
        return view('pages.index');
    }


    public function about() {
        return view('pages.about');
    }

    public function services() {
        /* using Laravel Query Builder Method
        $products=DB::table('products')
                        ->get();
        */
      // Using Laravel Eloquent Method
      $products = Product::inRandomOrder()->paginate(3);
     return view('pages.services')->with('products',$products);    
    }

    public function show($id){
        /* using Laravel Query Builder Method
        $product = DB::table('products')
                       ->where('id',$id)
                       ->first();
                       */
          // Using Laravel Eloquent Method
          $product = Product::find($id);

        return view('pages.show')->with('product', $product);
    }


        public function create(Request $request){
         return view('pages.create');

        }

        public function saveproduct(Request $request){
            //using Laravel  Eloquient Method

             $this->validate($request,['product_name' => 'required',
                                        'product_price' => 'required',
                                        'product_description'=>'required']);
 
            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_description = $request->product_description;

            $product->save();
            
            /*Using Laravel Query Builder Method
            $data = array();
            $data['product_name'] = $request->product_name;
            $data['product_price'] = $request->product_price;
            $data['product_description'] = $request->product_description;

            DB::table('products')
            ->insert($data);
              */

            Session::put('success', 'The product has been added successfully');

            return redirect('/create');


        }

        public function editproduct($id){
           $product=Product::find($id);
           return view('pages.editproduct')->with('product',$product);

        }

        public function updateproduct(Request $request){
            $product=Product::find($request->input('id'));
            $product->product_name=$request->input('product_name');
            $product->product_price=$request->input('product_price');
            $product->product_description=$request->input('product_description');
            $product->update();

            Session::put('success', 'The '.$request->input('product_name').'  has been updated successfully');
            return redirect('/services');

        }

        public function deleteproduct($id){
            $product=Product::find($id);
            $product->delete(); 
            
            Session::put('success', 'The '.$product->product_name.'  has been deleted successfully');
            return redirect('/services');
/*
            $product = DB::table('products')
                    ->where('id', $id)
                    ->first()
                    ->delete();

            DB::table('products')
            ->where('id',$id)
            ->delete(); */

            
        }
    }


