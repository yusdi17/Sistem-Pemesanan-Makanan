<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Order::with(['items.product']) // penting untuk eager loading
            ->where('order_status', 'processing')
            ->where('user_id', $user->id)
            ->get();
        return view('pesanan.pesanan', compact('orders'));
    }

    public function markAsCompleted(Order $order)
    {
        $order->order_status = 'completed';
        $order->save();

        return redirect()->back()->with('success', 'Pesanan telah diselesaikan.');
    }

    public function pesananSelesai()
    {
         $user = Auth::user();

        $orders = Order::with(['items.product']) // penting untuk eager loading
            ->where('order_status', 'completed')
            ->where('user_id', $user->id)
            ->get();
       return view('pesanan.selesai', compact('orders'));
    }
}
