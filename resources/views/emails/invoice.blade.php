<!-- resources/views/emails/invoice.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice Pesanan Anda</h1>

    <p>Terima kasih telah berbelanja di Warung Berkah!</p>

    <h2>Rincian Pesanan:</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Pembayaran: Rp {{ number_format($totalAmount, 0, ',', '.') }}</h3>

    <p>Metode Pembayaran: {{ $order->payment_method }}</p>
    <p>Kami akan segera memproses pesanan Anda. 🙏</p>
</body>
</html>

