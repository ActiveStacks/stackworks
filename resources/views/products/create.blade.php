@extends('layouts.app')


@section('title')
Create Page
@endsection

@section('content')

@if (Session::has('success'))
<div class="alert alert-success">
   {{Session::get('success')}}
   {{Session::put('success', null)}}
</div>   
@endif

{{--<form action="{{url('/saveproduct')}}" method="POST" class="form-horizontal">--}}
{!!Form::open(['action' => 'App\Http\Controllers\ProductController@store', 'method'=>'POST', 
'class'=>'form-horizontal', 'enctype' =>'multipart/form-data' ])!!}    
    
    {{csrf_field()}}
  
    <div class="form-group">
       {{--<label>Product</label>--}}
       {{--<input type="text" name="product_name" placeholder="Product Name" class="form-control" required>--}}
        {{Form::label('', 'Product Name')}}
        {{Form::text('product_name','', ['placeholder' => 'Product Name', 'class'=>'form-control'])}}
        
    </div>
    <div class="form-group">
        {{--<label>Product Price</label>--}}
        {{--<input type="text" name="product_price" placeholder="Product Price" class="form-control" required>--}}
        {{Form::label('', 'Product Price')}}
        {{Form::number('product_price','', ['placeholder' => 'Product Price', 'class'=>'form-control'])}}

    <div class="form-group">
        
            {{Form::file('product_image', [ 'class'=>'form-control'])}}



    </div>
    <div class="form-group">
        {{--<label>Product description</label>--}}
        {{--<textarea name="product_description" cols="30" rows="10" class="form-control" required></textarea>--}}
        {{Form::label('', 'Product Description')}}
        {{Form::text('product_description','', ['placeholder' => 'Product Description', 'class'=>'form-control'])}}
    </div>

    {{--<input type="submit" value="Add Product" class="btn btn-primary" >--}}
    {{Form::submit('Add Product', ['class'=>'btn btn-primary'])}}

{!!Form::close()!!}

{{--</form>--}}

@endsection