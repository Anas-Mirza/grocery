<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Item;
use App\Order;


class ItemsController extends Controller
{
    public function create(Request $request){
        $order_id = $request->id;
        $item_price = $request->price;
        $item_quantity = $request->quantity;
        $item_name = $request->itemname;
        $total = $item_price*$item_quantity;

        $item = new Item;

        $item->order_id = $order_id;
        $item->name = $item_name;
        $item->price = $item_price;
        $item->quantity = $item_quantity; 
        $item->save();
        
        $order = Order::find($order_id);

        $order->total_items += $item_quantity;
        $order->total_amount += $total;
        $order->status = 'open';
        $order->save(); 

        return response()->json(['success' => 'Added', 'id'=>$order_id,'item_name'=>$item_name ,'price'=>$item_price ,'quantity'=>$item_quantity]);   
        
    }

    public function index($id){
        return view('items.index')->with('data',['id'=>$id]);
    }
}
