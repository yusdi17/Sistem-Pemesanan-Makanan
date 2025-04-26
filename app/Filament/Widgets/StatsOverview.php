<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $jumlahProduk = Product::count();

        $produkTerjual = OrderItem::whereHas('order', function ($query) {
            $query->where('status', 'completed');
        })->sum('quantity');
    
        $pendapatan = Order::where('status', 'completed')->sum('total_amount');
    
        return [
            Stat::make('Jumlah Produk', $jumlahProduk),
            Stat::make('Produk Terjual', $produkTerjual),
            Stat::make('Jumlah Pendapatan', 'Rp ' . number_format($pendapatan, 0, ',', '.')),
        ];
    }
}
