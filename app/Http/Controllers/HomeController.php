<?php

namespace App\Http\Controllers;


use App\OrderDetail;
use App\Product;
use App\News;
use App\ProductVoucher;
use App\Order;
use App\User;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("layout.index");
    }

    public function about()
    {
        return view("layout.about");
    }

    public function post()
    {
        return view("layout.post");
    }

    public function contact()
    {
        return view("layout.contact");
    }

    public function show()
    {
        $newss = News::all();
        return view('layout.post', compact('newss'));
    }

    public function get()
    {
        $products = Product::all();
        return view('layout.about', compact('products'));
    }

    public function page()
    {
        $products = DB::table('product')->paginate(8);
        return view('layout.about',['products'=>$products]);
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::inRandomOrder()->limit(4)->get();
        return view('layout.detail', compact('product','products'));
    }

//    public function cart()
//    {
//        $sessionCart = Session::get("cart");
//        $countSession = array_count_values($sessionCart);
//        $product_in_cart = DB::table("category")->whereIn("id", $sessionCart)->get();
//        return view('layout.cart', compact('sessionCart', 'countSession', 'product_in_cart'));
//    }
//
//    public function add(Request $request)
//    {
//        $cart = Session::get('cart');
//        if ($cart) {
//            Session::put('cart' , array_merge($cart, [$request->get("id")]));
//        } else {
//            Session::put('cart' , [$request->get("id")]);
//        }
//        return redirect()->route("cart");
//    }
//
//    public function delete(Request $request)
//    {
//        $cart = Session::get('cart');
//        dd($cart);
//        unset($cart [$request->get("id")]);
//        Session::put('cart',$cart);
//        return redirect()->route("cart");
//    }

    public function cart()
    {
        $customer = auth()->user();
        $cart = Session::get("cart");
        $voucher_code = Session::get("voucher_code");
        $totalPrice = 0;
        $cartItems = [];
        foreach ($cart as $id => $qty) {
            $item = Product::find($id);
            if ($voucher_code) {
                if ($item) {
                    $dataCode = ProductVoucher::where('voucher_code', $voucher_code)->get();
                    foreach ($dataCode as $value) {
                        if ($item->type == $value->product_type) {
                            $totalPrice += ($item->price * $qty) * ($value->percent / 100);
                            $cartItems[$id] = [
                                'item' => $item,
                                'qty' => $qty,
                            ];
                        }
                    }
                }
            }
            if ($item) {
                $totalPrice += $item->price * $qty;
                $cartItems[$id] = [
                    'item' => $item,
                    'qty' => $qty,
                ];
            }
        }

//        if ($code) {
//            $dataCode = Voucher::where("code", $code)->first();
//            $totalPrice = $totalPrice * $dataCode->percent/100;
//        }
        return view('layout.cart', compact("cart", "cartItems" , "totalPrice", "customer"));
    }

    public function add(Request $request)
    {
        $cart = Session::get("cart");
//        if ($cart) {
        if (isset($cart[$request->get("id")]) && $keyExists = $cart[$request->get("id")]) {
            $newQuality = $keyExists+1;
            $cart[$request->get("id")] = $newQuality;
        } else {
            $cart[$request->get("id")] = 1;
        }
//        } else {
//            $cart = [];
//            $cart[$request->get("id")] = 1;
//        }
        Session::put("cart", $cart);
        return redirect()->route("cart");
    }

    public function delete(Request $request)
    {
        $cart = Session::get("cart");
        unset($cart[$request->get("id")]);
        Session::put("cart", $cart);
        return redirect()->route("cart");
    }

    public function voucher(Request $request)
    {
        if (ProductVoucher::where("voucher_code",$request->voucher_code)->first()) {
            Session::put("voucher_code", $request->voucher_code);
        }
        return redirect()->route("cart");
    }

    public function order(Request $request)
    {
        $cart = Session::get("cart");
        $voucher_code = Session::get("voucher_code");
        $totalPrice = 0;
        foreach ($cart as $id => $qty) {
            $item = Product::find($id);
            if ($voucher_code) {
                if ($item) {
                    $dataCode = ProductVoucher::where('voucher_code', $voucher_code)->get();
                    foreach ($dataCode as $value) {
                        $totalPrice += ($item->price * $qty) * ($value->percent / 100);
                    }
                }
            } else {
                if ($item) {
                    $totalPrice += $item->price * $qty;
                }
            }
        }
        $order = new Order();
        $order->check_date = date('Y-m-d H:i:s');
        $order->total_price = $totalPrice;
        $order->customer_phone = $request->customer_phone;
        $order->customer_address = $request->customer_address;
        $order->status = 'pending';
        $order->save();

        foreach ($cart as $keyId =>$qty) {
            $item = Product::find($keyId);
            if ($item) {
                if ($voucher_code) {
                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $order->id;
                    $order_detail->product_code = $item->code;
                    $order_detail->product_price = $item->price;
                    $order_detail->product_qty = $qty;
                    $order_detail->voucher_code = $voucher_code->voucher_code;
                    $order_detail->percent = $voucher_code->percent;
                    $order_detail->save();
                } else {
                    $order_detail = new OrderDetail();
                    $order_detail->order_id = $order->id;
                    $order_detail->product_code = $item->code;
                    $order_detail->product_price = $item->price;
                    $order_detail->product_qty = $qty;
                    $order_detail->voucher_code = null;
                    $order_detail->percent = null;
                    $order_detail->save();
                }
            }
        }
        return redirect()->route("order_detail", ["id" => $order->id]);
    }

    public function order_detail()
    {
        return view('layout.customer');
    }

}


