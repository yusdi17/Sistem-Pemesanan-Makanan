<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        #cart-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #0d6efd;
            color: white;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            z-index: 1000;
            cursor: pointer;
        }

        #cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            font-size: 12px;
            padding: 3px 6px;
            border-radius: 50%;
        }

        #cart-details {
            position: fixed;
            bottom: 85px;
            right: 20px;
            width: 300px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            padding: 15px;
            display: none;
            z-index: 1000;
        }
    </style>

</head>

<body>

    <!-- Menu -->
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


    <!-- Footer -->
    <footer
        class="mt-auto d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top container bg-body-tertiary">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2025 Yusdi Fathudin</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
                <a class="text-body-secondary" href="https://instagram.com/yuss.id17" target="_blank"
                    aria-label="Instagram">
                    <i class="fab fa-instagram" style="font-size: 1.5rem;"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-body-secondary" href="https://www.facebook.com/profile.php?id=100010838986673"
                    target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook" style="font-size: 1.5rem;"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-body-secondary" href="https://github.com/yusdi17" target="_blank" aria-label="Facebook">
                    <i class="fa-brands fa-github" style="font-size: 1.5rem;"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="text-body-secondary" href="https://www.linkedin.com/in/yussd-id73/" target="_blank"
                    aria-label="Facebook">
                    <i class="fa-brands fa-linkedin"style="font-size: 1.5rem;"></i>
                </a>
            </li>
        </ul>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

    <!-- Floating Cart Icon -->
    <div id="cart-button" onclick="toggleCartDetails()">
        <i class="fa fa-shopping-cart"></i>
        <span id="cart-count">0</span>
    </div>

    <!-- Cart Details -->
    <div id="cart-details">
        <div class="cart-header d-flex justify-content-between align-items-center">
            <h5>Keranjang</h5>
            <button class="btn btn-sm btn-danger" onclick="toggleCartDetails()">Tutup</button>
        </div>
        <ul id="cart-items" class="list-group mt-2 mb-3"></ul>
        <button class="btn btn-primary w-100">Checkout</button>
    </div>


    <script>
        let cart = [];

        function toggleCartDetails() {
            const cartDetail = document.getElementById('cart-details');
            cartDetail.style.display = cartDetail.style.display === 'none' || cartDetail.style.display === '' ? 'block' :
                'none';
        }

        function updateCartUI() {
            const cartItems = document.getElementById('cart-items');
            const cartCount = document.getElementById('cart-count');
            cartItems.innerHTML = '';
            let totalQty = 0;

            cart.forEach(item => {
                totalQty += item.qty;
                cartItems.innerHTML += `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    ${item.name}
                    <span class="badge bg-primary rounded-pill">${item.qty}</span>
                </div>
                <button class="btn btn-sm btn-danger" onclick="removeFromCart('${item.id}')">
                    <i class="fa fa-trash"></i>
                </button>
            </li>
        `;
            });

            cartCount.innerText = totalQty;
        }

        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            updateCartUI();
        }


        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const price = this.dataset.price;

                const existing = cart.find(p => p.id === id);
                if (existing) {
                    existing.qty += 1;
                } else {
                    cart.push({
                        id,
                        name,
                        price,
                        qty: 1
                    });
                }

                updateCartUI();
            });
        });
    </script>



</body>

</html>
