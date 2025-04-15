@extends('order.index')
@section('title', 'Order')

@section('menu')
@foreach ($categories as $category)
<div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">{{ $category->name }}</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse ($category->products as $product)
            <div class="col">
                <div class="card shadow-sm">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                            class="bd-placeholder-img card-img-top" width="100%" height="225"
                            style="object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <p class="card-text">{{ $product->name }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart"
                                    data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>

                            </div>
                            <small class="text-body-secondary">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada produk dalam kategori ini.</p>
        @endforelse
    </div>
</div>
@endforeach

@endsection