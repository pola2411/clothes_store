@extends('public_user.layout.layout')

@section('boby')

<div class="container">
    <div class="row">
         @foreach($items as $row)
        <div class="card col-md-3 card_show" >




            <img src="{{asset($row->associatedModel->image)}}" width="200px" height="200px" alt="...">
            <div class="card-body">
                <ul>
                    <li>Product Name: {{ $row->name}}</li>
                    <li>Product Color: {{$row->attributes->color}}</li>
                    <li>Product Size: {{$row->attributes->size}}</li>
                    <li>Product Quantity: {{$row->quantity}}</li>
                    <li>Product Price One: {{ $row->price}} LE </li>
                    <li>Total Of Price : {{$row->quantity* $row->price}} LE</li>
                </ul>
                <a href="{{route('order_create')}}" class="btn btn-info">Edit</a>








            </div>


          </div> @endforeach
           <div class="cheak col-md-12 mx-auto">
                <h1 class="card-title">totle: {{ $totla}} LE</h1>
                <a href="{{route('order_create')}}" class="btn btn-info">submit order</a>
            </div>
    </div>
</div>

@endsection

