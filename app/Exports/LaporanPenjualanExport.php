<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPenjualanExport implements FromView
{
    protected $periode;

    public function __construct($periode)
    {
        $this->periode = $periode;
    }

    public function view(): View
    {
        $startDate = match ($this->periode) {
            'hari' => Carbon::now()->startOfDay(),
            'minggu' => Carbon::now()->startOfWeek(),
            'bulan' => Carbon::now()->startOfMonth(),
            'tahun' => Carbon::now()->startOfYear(),
            default => Carbon::now()->startOfDay(),
        };

        $orders = Order::where('created_at', '>=', $startDate)->get();

        return view('exports.laporan-penjualan', [
            'orders' => $orders,
        ]);
    }
}
