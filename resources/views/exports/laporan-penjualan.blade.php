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

