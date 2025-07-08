<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('order.menu', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cart = session('cart', []);
        return view('checkout.checkout', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $cart = session('cart', []);
    //     if (empty($cart)) {
    //         return redirect()->back()->with('error', 'Pesanan kosong!');
    //     }
    //     $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    //     if (Auth::check()) {

    //         $user = Auth::user();
    //         $request->validate([
    //             'customer_phone' => 'required|string',
    //             'customer_address' => 'required|string',
    //         ]);
    //        $order = Order::create([
    //         'user_id' => $user->id,
    //         'customer_name' => $user->name,
    //         'customer_email' => $user->email,
    //         'customer_phone' => $request->customer_phone,
    //         'customer_address' => $request->customer_address,
    //         'total_amount' => $total,
    //         'status' => 'pending',
    //     ]);

    //     } else {
            
    //         $request->validate([
    //             'customer_name' => 'required|string',
    //             'customer_email' => 'required|email',
    //             'customer_phone' => 'required|string',
    //             'customer_address' => 'required|string',
    //         ]);
        
    
        
    //         $order = Order::create([
    //             'user_id' => null,
    //             'customer_name' => $request->customer_name,
    //             'customer_email' => $request->customer_email,
    //             'customer_phone' => $request->customer_phone,
    //             'customer_address' => $request->customer_address,
    //             'total_amount' => $total,
    //             'status' => 'pending',
    //         ]);
    //     }
    
    //     // simpan detail pesanan 
    //     foreach ($cart as $item) {
    //         $order->items()->create([
    //             'product_id' => $item['product_id'],
    //             'quantity' => $item['quantity'],
    //             'price' => $item['price'],
    //         ]);
    //     }
    
    //     session()->forget('cart');
    
    //     return redirect()->route('order.success')->with('success', 'Pesanan berhasil dibuat.');
    
    // }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('pesanan.pesanan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
