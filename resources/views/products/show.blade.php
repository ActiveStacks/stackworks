@extends('layouts.app')

@section('title')
Services
@endsection

     
@section('content')
        <h1>Welcome to the services page</h1>
        <h3>Product Details</h3>
        
        <div>
            <h1>{{$product->product_name}}</h1>
            <h3>{{$product->product_price}}</h3>
            <p>{{$product->product_description}}</p>
            <hr>
            <h4> Written at {{$product->created_at}}</h4>
            <hr>
            <a href="/products/{{$product->id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open([ 'action' => ['App\Http\Controllers\ProductController@destroy', $product->id], 'class'=>'pull-center'])!!}
               {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
               {{Form::hidden('_method', 'DELETE')}}
            {!!Form::close()!!}
  
        </div>     
      

@endsection