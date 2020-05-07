<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function __construct()
    {
    }

    public function getOrder($phone_number)
    {
        $orders = Order::where('customer_phone',$phone_number)->get();
        return view('admin.order.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function store(Request $request)
    {
        if (Order::where('id', $request->id)->first()) {
            return "Đã tồn tại";
        } else {
            $order = new Order();
            $order->check_date = $request->check_date;
            $order->total_price = $request->total_price;
            $order->customer_phone = $request->customer_phone;
            $order->customer_address = $request->customer_address;
            $order->status = $request->status;
            $order->save();
            return view('admin.order.create', compact('order'));
        }
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->check_date = $request->check_date;
        $order->total_price = $request->total_price;
        $order->customer_phone = $request->customer_phone;
        $order->customer_address = $request->customer_address;
        $order->status = $request->status;
        $order->save();
        return view('admin.order.show', compact('order'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response('', 200);
    }

    public function user()
    {
        $users = User::has('orders')->get();
        return view('admin.user.index', compact('users'));
    }
}
