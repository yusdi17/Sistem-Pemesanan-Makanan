@extends('checkout.index')
@section('title', 'Checkout')

@section('content')
<div class="container">
  <main>
    <div class="py-5 text-center">
        <h1 class="h2">Checkout</h1>
    </div>

    <div class="row g-5">
        {{-- KERANJANG --}}
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Pesanan Anda</span>
                <span class="badge bg-primary rounded-pill">{{ count($cart ?? []) }}</span>
            </h4>
            <ul class="list-group mb-3">
                @php
                    $total = 0;
                @endphp
                @foreach ($cart as $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $item['name'] }}</h6>
                            <small class="text-body-secondary">{{ $item['quantity'] }}x</small>
                        </div>
                        <span class="text-body-secondary">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                </li>
            </ul>
        </div>

        {{-- FORM PEMESAN --}}
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Data Pemesan</h4>
            <form action="{{ route('checkout.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="row g-3">
                <div class="col-sm-12">
                  <label for="firstName" class="form-label">Nama pemesan</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Masukkan nama anda" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
    
                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-body-secondary"></span></label>
                  <input type="email" class="form-control" id="email" placeholder="contoh : you@gmail.com">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">No WhatsApp <span class="text-body-secondary"></span></label>
                  <input type="email" class="form-control" id="email" placeholder="Contoh : 082278907654">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>
    
                <div class="col-12">
                  <label for="address" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="address" placeholder="Contoh : Dusun Durian Runtuh, RT01/RW02, Desa Manggis, Kecamatan Timun, Kabupaten Jeruk" required>
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>
    
              <div class="col-12 mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                  <option value="" selected disabled>Pilih metode pembayaran</option>
                  <option value="bank_transfer">Transfer Bank</option>
                  <option value="COD">Bayar di Tempat (COD)</option>
                </select>
                <div class="invalid-feedback">
                  Silakan pilih metode pembayaran.
                </div>
              </div>
              
    
              <hr class="my-4">

                <!-- Form fields for customer data... -->
                <button class="w-100 btn btn-primary btn-lg" type="submit">Lanjut Checkout</button>
            </form>
        </div>
    </div>
</main>


  
  <footer class="my-5 pt-5 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; 2017–2025 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>