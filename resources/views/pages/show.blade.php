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
            <a href="/edit/{{$product->id}}" class="btn btn-default">Edit</a>
            <a hre="/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
  
        </div>     
      

@endsection