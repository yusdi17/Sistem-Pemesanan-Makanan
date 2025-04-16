@extends('checkout.index')
@section('title', 'Success')

@section('content')
<div class="container text-center mt-5">
  <h2>Terima kasih!</h2>
  <p>Pesanan Anda berhasil dibuat. Kami akan segera memprosesnya.</p>
  <a href="{{ route('order.menu') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>
@endsection