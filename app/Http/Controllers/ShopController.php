<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product=$product;
    }
    public function index(){
        $products=$this->product->all();
        return view('home',compact('products'));
    }
}
