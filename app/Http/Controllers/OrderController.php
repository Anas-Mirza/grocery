<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id','asc')->paginate(10);
        return view('orders.index')->with('orders',$orders);
    }

    public function show($id){
        $order = Order::find($id);
        if($order->status == 'freeze'){
        $items = $order->items()->paginate(5);
        return view('orders.show')->with('items',$items);
        }
        else
        return redirect()->route('add_order_items',['id'=>$id] );
    }

    public function create(){
        $order = new Order;
        $order->total_amount = 0.0;
        $order->total_items = 0;
        $order->status = 'new';
        $order->save();
        return redirect()->route('orders');
    }

    public function update( $id){
        $order = Order::find($id);
        $order->status = 'freeze';
        $order->save();
        return response()->json(['success' => 'Freezed']);
    }

}

