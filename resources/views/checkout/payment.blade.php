@extends('checkout.index') {{-- Sesuaikan dengan layout utama kamu --}}

@section('title', 'Pembayaran')

@section('content')
<div class="container text-center py-5">
    <h1>Proses Pembayaran</h1>
    <p>Mohon tunggu, anda akan diarahkan ke pembayaran...</p>

    <div id="result-json"></div>
</div>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
  snap.pay('{{ $order->snap_token }}', {
    onSuccess: function(result){
      console.log(result);
      window.location.href = "{{ route('checkout.success') }}";
    },
    onPending: function(result){
      console.log(result);
      window.location.href = "{{ route('checkout.pending') }}";
    },
    onError: function(result){
      console.log(result);
      alert('Pembayaran gagal! Silakan ulangi.');
      window.location.href = "{{ route('checkout.failed') }}";
    }
  });
</script>
@endsection
