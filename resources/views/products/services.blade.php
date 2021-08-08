@extends('layouts.app')

@section('title')
Services
@endsection

     
@section('content')
        <h1>Welcome to the services page</h1>

        @if (Session::has('success'))
        <div class="alert alert-success">
           {{Session::get('success')}}
           {{Session::put('success', null)}}
        </div>   
        @endif

        @foreach ($products as $product)
        <div class="well">
            <h1><a href="/products/{{$product->id}}">{{$product->product_name}}</a></h1>
            <h3>{{$product->product_price}}</h3>
             {{-- <p>{{$product->product_description}}</p>
            <hr>
            <h4>{{$product->created_at}}</h4> --}}
        </div>     
        @endforeach
        {{$products->links()}}

@endsection