@extends('layouts.app')

@section('content')
@if(count($items)>0)
<table class = "table table-striped">
    <thead>
    <tr>
    <th>Order ID</th>
    <th>Item Name</th>
    <th>Item Quantity</th>
    <th>Item Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
    <tr>
    <td>{{$item->order_id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->quantity}}</td>
    <td>{{$item->price}}</td>
    </tr>
    @endforeach
    </tbody>
    <br>
    <a href = "/" class = "btn btn-default">Go to Order page</a>
    {{$items->links()}}
@endif    
@endsection
