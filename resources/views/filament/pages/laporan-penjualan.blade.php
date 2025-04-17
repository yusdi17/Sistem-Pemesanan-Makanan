<x-filament::page>
    <div class="space-y-4">
        {{ $this->form }}

        <div class="text-xl font-semibold">
            Total Penjualan: Rp{{ number_format($totalAmount, 0, ',', '.') }}
        </div>

        <div class="text-lg">
            Jumlah Order: {{ $totalOrder }}
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-bold mb-2">Detail Order</h3>
            <table class="w-full text-left border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">Tanggal</th>
                        <th class="p-2 border">Customer</th>
                        <th class="p-2 border">Total</th>
                        <th class="p-2 border">Item</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="p-2 border">{{ $order->id }}</td>
                            <td class="p-2 border">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="p-2 border">{{ $order->customer_name }}</td>
                            <td class="p-2 border">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td class="p-2 border">
                                <ul class="list-disc list-inside">
                                    @foreach ($order->orderItems as $item)
                                        <li>{{ $item->product->name ?? 'Produk?' }} x{{ $item->quantity }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>Tanggal</th>
              <th>Total</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($orders as $order)
              <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->created_at->format('d-m-Y') }}</td>
                  <td>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                  <td>{{ $order->status ?? '-' }}</td>
              </tr>
          @endforeach
      </tbody>
    </table>
    <a 
        href="{{ route('laporan.export', ['periode' => $periode]) }}"
        class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
    >
        📤 Export Excel
    </a>
    
    
</x-filament::page>
