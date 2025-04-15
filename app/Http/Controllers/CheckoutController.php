<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout.checkout', compact('cart', 'total'));
    }
    public function store(Request $request)
    {
        $cart = json_decode($request->cart_data, true);
        session()->put('cart', $cart);

        return redirect()->route('checkout.create');
    }

    public function create()
    {
        $cart = session()->get('cart', []);

        return view('checkout.checkout', ['cart' => $cart]);
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->id;
        $productName = $request->name;
        $productPrice = $request->price;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function getCart()
    {
        $cart = session()->get('cart', []);
        return response()->json(['cart' => $cart]);
    }

    public function remove(Request $request)
{
    $cart = session()->get('cart', []);

    unset($cart[$request->id]);

    session()->put('cart', $cart);

    return response()->json(['cart' => $cart]);

}


}
