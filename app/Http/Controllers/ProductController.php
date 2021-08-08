<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $products = Product::inRandomOrder()->paginate(3);
        return view('products.services')->with('products',$products);
      // print('THIS IS THE DEFAULT FUNCTION');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['product_name' => 'required',
        'product_price' => 'required',
        'product_description'=>'required',
         'product_image'=>'image|nullable|max:1999']);

        //print('This image is'.$request->file('product_image'));
        $fileNameWithExt = $request-> file('product_image')->getClientOriginalName();
        echo '<pre></pre>';
        print('The original name is: '.$fileNameWithExt. '/h1>');
       

        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        print('<h1>The file name is: ' .$filename. '</h1>');

        $ext = $request-> file('product_image')->getClientOriginalExtension();
        print('<h1>The extension is :  '.$ext. '</h1>');

        $fileNameToStore = $filename.'_'.time().'.'.$ext;
        echo '<pre></pre>';
        print('<h1>The filename to store is: '.$fileNameToStore. ' </h1>');
       


         $product = new Product();
         $product->product_name = $request->input('product_name');
         $product->product_price = $request->product_price;
         $product->product_description = $request->product_description;

         $product->save();

         Session::put('success', 'The  ' .$request->input('product_name'). '  has been added successfully');

         //return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('products.editproducts')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->product_name=$request->input('product_name');
        $product->product_price=$request->input('product_price');
        $product->product_description=$request->input('product_description');
        $product->update();

        Session::put('success', 'The '.$request->input('product_name').'  has been updated successfully');
        return redirect('/products');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
            $product->delete(); 
            
            Session::put('success', 'The '.$product->product_name.'  has been deleted successfully');
            return redirect('/products');
    }
}
