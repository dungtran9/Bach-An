<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(4);
        return view('product.list', compact('products'));
    }
    public function show(){
        $products = Product::all();
        return view('product.menuProduct', compact('products'));
    }
    public function viewProduct($id){
        $product = Product::findOrFail($id);
        $products = Product::all();
        return view('product.detail',compact('product','products'));
    }

    public function add()
    {
        return view('product.add');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->decs = $request->decs;
        $product->qty = $request->qty;
        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
            $product->image = $path;
        }
        $product->save();
        toastr()->success('Thêm mới sản phẩm thành công');
        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->bills()->detach();
        $product->delete();
        toastr()->success('Xóa sản phẩm thành công');
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->decs = $request->decs;
        $product->qty = $request->qty;
        if ($request->hasFile('image')) {
            $currentImg = $product->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $path = $request->image->store('images');
            $product->image = $path;
        }
        $product->save();
        toastr()->success('Chỉnh sửa thông tin sản phẩm thành công');
        return redirect()->route('product.index');
    }
}
