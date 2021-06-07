@extends('layouts.app')

@section('content')
<div class = "container">
    <div align = "right">
    <form action = "/createorder" method = "POST">
    @csrf
    <input type = "submit" value = "Create">
    </form>
    </div>         
@if(count($orders)>0)
   
    <table class = "table table-striped">
    <thead>
    <tr>
    <th>Order Number</th>
    <th>Total Amount</th>
    <th>Total quantity</th>
    <th>Status</th>
    <th>Freeze</th>
    <th>Add Item</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
          <tr>
          <td><a href = "/{{$order->id}}">{{$order->id}}</a></td>
          <td>{{$order->total_amount}}</td>
          <td>{{$order->total_items}}</td>
          <td>{{$order->status}}</td>
          <td>

          @if($order->status == "freeze")
            <button type = "button" class = "freeze" id = "freeze{{$order->id}}" disabled = "true" > freeze{{$order->id}} </button></td>
            <td><a href = "/{{$order->id}}/additem" class = "btn btn-default" id = "addlink{{$order->id}}" style = "display:none">Add Item</a>
          @else
            <button type = "button" class = "freeze" id = "freeze{{$order->id}}"  > freeze{{$order->id}} </button></td>
            <td><a href = "/{{$order->id}}/additem" class = "btn btn-default" id = "addlink{{$order->id}}">Add Item</a>

          @endif
          </td>
          </tr>
    @endforeach
    {{$orders->links()}}
    </tbody>
    </div>

@else
<h2>No orders! </h2>

@endif          
@endsection