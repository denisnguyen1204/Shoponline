<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Http\Request;


class OrderDetailController extends Controller
{
    public function __construct()
    {
    }

    public function get($id)
    {
        $order_details = OrderDetail::where('order_id',$id)->get();
        return view('admin.order_detail.index', compact('order_details'));
    }

//    public function edit($id)
//    {
//        $order_detail = OrderDetail::findOrFail($id);
//        return view('admin.order_detail.show', compact('order_detail'));
//    }
//
//    public function create()
//    {
//        return view('admin.order_detail.create');
//    }
//
//    public function store(Request $request)
//    {
//        if (OrderDetail::where('id', $request->id)->first()) {
//            return "Đã tồn tại";
//        } else {
//            $order_detail = new OrderDetail();
//            $order_detail->order_id = $request->order_id;
//            $order_detail->product_code = $request->product_code;
//            $order_detail->product_price = $request->product_price;
//            $order_detail->product_qty = $request->product_qty;
//            $order_detail->voucher_code = $request->voucher_code;
//            $order_detail->percent = $request->percent;
//            $order_detail->save();
//            return view('admin.order_detail.create', compact('order_detail'));
//        }
//    }
//
//    public function update(Request $request, $id)
//    {
//        $order_detail = OrderDetail::findOrFail($id);
//        $order_detail->order_id = $request->order_id;
//        $order_detail->product_code = $request->product_code;
//        $order_detail->product_price = $request->product_price;
//        $order_detail->product_qty = $request->product_qty;
//        $order_detail->voucher_code = $request->voucher_code;
//        $order_detail->percent = $request->percent;
//        $order_detail->save();
//        return view('admin.order_detail.show', compact('order_detail'));
//    }
//
//    public function destroy($id)
//    {
//        $order_detail = OrderDetail::findOrFail($id);
//        $order_detail->delete();
//        return response('', 200);
//    }

}

