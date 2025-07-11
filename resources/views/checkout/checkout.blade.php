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
                    @auth
                        <form action="{{ route('checkout.store') }}" method="POST" class="needs-validation">
                            @csrf

                            <div class="row g-3">

                                <div class="col-sm-12">
                                    <label class="form-label">Nama pemesan</label>
                                    <input name="customer_name" type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input name="customer_email" type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">No WhatsApp</label>
                                    <input name="customer_phone" type="tel" name="customer_phone" class="form-control" id="tel"
                                        value="{{ Auth::user()->phone ?? '' }}" required placeholder="Contoh: 082278907654" readonly>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Alamat</label>
                                    <input name="customer_address" type="text" name="customer_address" class="form-control" id="address"
                                        value="{{ Auth::user()->alamat ?? '' }}" required placeholder="Alamat lengkap" readonly>
                                </div>

                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit">Bayar</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('checkout.store') }}" method="POST" class="needs-validation">
                            @csrf

                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="name" class="form-label">Nama pemesan</label>
                                    <input type="text" name="customer_name" class="form-control" id="firstName"
                                        placeholder="Masukkan nama anda" value="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span
                                            class="text-body-secondary"></span></label>
                                    <input type="email" name="customer_email" class="form-control" id="email"
                                        placeholder="contoh : you@gmail.com">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="tel" class="form-label">No WhatsApp <span
                                            class="text-body-secondary"></span></label>
                                    <input type="tel" name="customer_phone" class="form-control" id="tel"
                                        placeholder="Contoh : 082278907654">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" name="customer_address" class="form-control" id="address"
                                        placeholder="Contoh : Dusun Durian Runtuh, RT01/RW02, Desa Manggis, Kecamatan Timun, Kabupaten Jeruk"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>


                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit">Bayar</button>
                        </form>
                    @endauth
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
