<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class VoucherController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $vouchers = Voucher::all();
        return view('admin.voucher.index', compact('vouchers'));
    }

    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);
        return view('admin.voucher.show', compact('voucher'));
    }

    public function create()
    {
        return view('admin.voucher.create');
    }

    public function store(Request $request)
    {
        if (Voucher::where('code',$request->code)->first())
        {
            return "Đã tồn tại";
        } else {
            $voucher = new Voucher();
            $voucher->code = $request->code;
//            $voucher->percent  = $request->percent;
            $voucher -> save();
            return view('admin.voucher.create');
        }
    }

//    public function update(Request $request, $id)
//    {
//        $voucher = Voucher::findOrFail($id);
//        $voucher->percent = $request->percent;
//        $voucher->save();
//        return view('admin.voucher.show');
//    }

    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();
        return response('',200);
    }
}
