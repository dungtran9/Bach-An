<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Cart;
use App\Customer;
use App\Detail;
use App\Product;
use App\Mail;
use App\Mail\ShoppingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart(Request $request)
    {
       $idProduct = $request->get('idProduct');
        $product = $this->product->findOrFail($idProduct);
        $oldCart = Session::get('cart');

        $newCart = new Cart($oldCart);
        $newCart->add($product);
        Session::put('cart', $newCart);

        return response()->json($newCart->totalQty);
//        toastr()->success('Thêm sản phẩm vào giỏ hàng thành công');

    }

    public function index()
    {
        $cart = Session::get('cart');
        return view('cart.index', compact('cart'));
    }

    public function remove($idProduct)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->remove($idProduct);
                Session::put('cart', $cart);
                toastr()->success('Đã xóa sản phẩm trong giỏ hàng');
            } else {
                toastr()->error('Bạn chưa mua sp nào');
            }
        } else {
            toastr()->error('Bạn chưa mua sp nào');
        }
        return back();
    }

    public function update(Request $request, $idProduct)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->update($request, $idProduct);
                Session::put('cart', $cart);
                $message = 'cập nhật giỏ hàng thành công';
            } else {
                $message = 'Bạn chưa mua sản phẩm nào';
            }
        } else {
            $message = 'Bạn chưa mua sản phẩm nào';
        }

        $data = [
            'productUpdate' => Session::get('cart')->items[$idProduct],
            'message' => $message,
            'totalPriceCart' => Session::get('cart')->totalPrice
        ];

        return response()->json($data);
    }

    public function checkOut()
    {
        $cart = Session::get('cart');
        return view('cart/checkout', compact('cart'));
    }

    public function payment(Request $request)
    {
        $cart = Session::get('cart');
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        $bill = new Bill();
        $bill->totalPrice = $cart->totalPrice;
        $bill->note = $request->note;
        $bill->customer_id = $customer->id;
        $bill->save();
//        $detail = [];
        foreach ($cart->items as $key => $product) {
            $details = new Detail();
            $details->bill_id=$bill->id;
            $details->product_id=$key;
            $details->qtyOrder=$product['totalQty'];
            $details->save();
        }
//        \Illuminate\Support\Facades\Mail::to($bill->email)->send(new ShoppingMail($bill, $detail));
        toastr()->success('Đơn hàng của bạn đang được xử lý ');

        Session::forget('cart');
        return redirect()->route('shop-home');
    }
}
