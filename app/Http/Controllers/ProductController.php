<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        if (Product::where('code', $request->code)->first()) {
            return "Đã tồn tại";
        } else {
            $product = new Product();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $product->image = $file->getClientOriginalName();
                $file->move('images', $file->getClientOriginalName());
            }

            $product->code = $request->code;
            $product->branch = $request->branch;
            $product->type = $request->type;
            $product->sex = $request->sex;
            $product->size = $request->size;
            $product->status = $request->status;
            $product->price = $request->price;
            $product->save();
            return view('admin.product.create', compact('product'));
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $product->image = $file->getClientOriginalName();
            $file->move('images', $file->getClientOriginalName());
        }
        $product->branch = $request->branch;
        $product->type = $request->type;
        $product->sex = $request->sex;
        $product->size = $request->size;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->save();
        return view('admin.product.show', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response('', 200);
    }
}
