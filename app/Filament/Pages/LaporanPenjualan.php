<?php

namespace App\Filament\Pages;

use App\Models\Order;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\Select;

class LaporanPenjualan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    protected static string $view = 'filament.pages.laporan-penjualan';

    protected static ?string $navigationLabel = 'Laporan Penjualan';
    protected static ?string $title = 'Laporan Penjualan';
    protected static ?string $navigationGroup = 'Report';
    

    public $periode = 'hari';
    public $totalAmount = 0;
    public $totalOrder = 0;
    public $orders = [];

    public function mount(): void
    {
        $this->updateData();
    }

    public function updatedPeriode()
    {
        $this->updateData();
    }

    public function updateData()
    {
        $startDate = match ($this->periode) {
            'hari' => Carbon::now()->startOfDay(),
            'minggu' => Carbon::now()->startOfWeek(),
            'bulan' => Carbon::now()->startOfMonth(),
            'tahun' => Carbon::now()->startOfYear(),
            default => Carbon::now()->startOfDay(),
        };
    
        $query = Order::where('created_at', '>=', $startDate);
    
        $this->totalAmount = $query->sum('total_amount');
        $this->totalOrder = $query->count();
    
        $this->orders = $query->with('orderItems.product')->get();
    }

    // Form Schema untuk select filter
    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('periode')
            ->label('Filter Waktu')
            ->options([
                'hari' => 'Hari Ini',
                'minggu' => 'Minggu Ini',
                'bulan' => 'Bulan Ini',
                'tahun' => 'Tahun Ini',
            ])
            ->default('hari')
            ->reactive()
            ->afterStateUpdated(fn () => $this->updateData()),
        ]);
    }
}
