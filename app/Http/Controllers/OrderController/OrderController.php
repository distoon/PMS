<?php

namespace App\Http\Controllers\OrderController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Order;
use App\ItemOrder;
use App\Delivery;

class OrderController extends Controller
{
  public function create()
  {
    $products = Item::where('quantity','>','0')->get();
    $address = Order::select('address')->where('user_id',\Auth::user()->id)->first();
    $deliveries = Delivery::all();
    return view('orders.create',compact('products','address','deliveries'));
  }
  public function store(Request $request)
  {
    $this->validate($request,[
      'address' => 'required|max:500',
      'id' => 'required|min:1',
    ]);
    $user_id = \Auth::user()->id;
    $total_price = 0;
    $prices = $request->price;
    $quantities = $request->quantity;
    foreach ($prices as $key => $price) {
      $total_price = $total_price + ($price * $quantities[$key]);
    }
    $order = Order::create([
      'user_id' => $user_id,
      'delivery_id' => $request->delivery_id,
      'total_price' => $total_price,
      'address' => $request->address
    ]);
    foreach ($request->id as $key => $value) {
      ItemOrder::create([
        'item_id' => $value,
        'order_id' => $order->id,
      ]);
    }
    if(\Auth::user()->role()){
      return redirect()->route('order.myOrders');
    }
    return redirect()->route('order.all');
  }
    public function myOrders()
  {
    $orders = Order::where('user_id',\Auth::user()->id)->get();
    return view('orders.myOrders',compact('orders'));
  }
  public function index()
  {
    $orders = Order::all();
    return view('orders.all',compact('orders'));
  }
}
