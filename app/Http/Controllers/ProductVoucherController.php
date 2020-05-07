<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ProductVoucher;
use Faker\Provider\File;
use Illuminate\Http\Request;


class ProductVoucherController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $product_vouchers = ProductVoucher::all();
        return view('admin.product_voucher.index', compact('product_vouchers'));
    }

    public function edit($id)
    {
        $product_voucher = ProductVoucher::findOrFail($id);
        return view('admin.product_voucher.show', compact('product_voucher'));
    }

    public function create()
    {
        return view('admin.product_voucher.create');
    }

    public function store(Request $request)
    {
        $product_voucher = new ProductVoucher();
        $product_voucher->fill($request->input())->save();
        return view('admin.product_voucher.create', compact('product_voucher'));
    }

    public function update(Request $request, $id)
    {
        $product_voucher = ProductVoucher::findOrFail($id);
        if ($product_voucher) {
            $product_voucher->fill($request->input())->save();
        }
        return view('admin.product_voucher.show', compact('product_voucher'));
    }

    public function destroy($id)
    {
        $product_voucher = ProductVoucher::findOrFail($id);
        $product_voucher->delete();
        return response('', 200);
    }
}
