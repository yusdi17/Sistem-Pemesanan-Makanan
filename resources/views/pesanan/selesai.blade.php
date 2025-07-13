@extends('profile.index')
@section('title', 'Pesanan Selesai')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a style="text-decoration: none;" href="/">Home</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration: none;" href="/pesanan-saya">Pesanan Saya</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pesanan Selesai</li>
                            <li class="breadcrumb-item"><a style="text-decoration: none;" href="/cancelled">Pesanan Dibatalkan</a></li>
                        </ol>
                    </nav>
                </div>
            </div>

            @foreach ($orders as $order)
                <div class="row mb-3">
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col">
                                <div class="card card-stepper" style="border-radius: 10px;">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-column">
                                                <span class="lead fw-normal">Pesanan selesai</span>
                                                <span class="text-muted small">
                                                    {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $order->id }}">
                                                    Detail
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel{{ $order->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start p-4">
                                <h5 class="modal-title text-uppercase mb-3" id="exampleModalLabel{{ $order->id }}">
                                    {{ $order->customer_name }}
                                </h5>
                                <h4 class="mb-4">Terima kasih atas pesanan Anda</h4>
                                <p class="mb-0">Ringkasan Pembayaran</p>
                                <hr class="mt-2 mb-4"
                                    style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
                                @if ($order->items)
                                    @foreach ($order->items as $item)
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold mb-0">
                                                {{ $item->product->name ?? 'Produk tidak ditemukan' }}
                                                (Qty:{{ $item->quantity }})
                                            </p>
                                            <p class="text-muted mb-0">
                                                Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">Tidak ada item.</p>
                                @endif


                                <div class="d-flex justify-content-between mt-3">
                                    <p class="fw-bold">Total</p>
                                    <p class="fw-bold">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
