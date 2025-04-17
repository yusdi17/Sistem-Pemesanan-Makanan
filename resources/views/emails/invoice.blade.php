<!-- resources/views/emails/invoice.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
            color: #333;
        }

        .invoice-container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border: 1px solid #eee;
            border-radius: 8px;
        }

        h1, h2, h3 {
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
            color: #27ae60;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .thank-you {
            margin-top: 10px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <h1>Invoice Pesanan Anda</h1>

        <h2>Rincian Pesanan</h2>
        <table>
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

        <p class="total">Total Pembayaran: Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>

        <div class="footer">
            <p>Terima kasih telah berbelanja di <strong>Warung Berkah</strong>!</p>
            <p class="thank-you">Kami akan segera memproses pesanan Anda. 🙏</p>
        </div>
    </div>
</body>
</html>
