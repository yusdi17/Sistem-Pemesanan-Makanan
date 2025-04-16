@extends('checkout.index')
@section('title', 'Success')

@section('content')
<div class="container text-center py-5">
  <h1 class="mb-4">Pesanan Berhasil!</h1>
  <p class="mb-3">Terima kasih telah memesan. Kami akan segera memproses pesanan Anda.</p>

  <a href="{{ url('/') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>

<script>
  window.onload = function () {
      const number = "{{ $waNumber ?? '' }}";
      const message = encodeURIComponent(`{{ $waMessage ?? '' }}`);
      if (number && message) {
          window.open(`https://wa.me/${number}?text=${message}`, '_blank');
      }
  };
</script>

@endsection