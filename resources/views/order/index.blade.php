<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
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
    @yield('menu')

    <!-- Footer -->
    @include('order.footer')

    <!-- Floating Cart Icon -->
    @include('order.cart')

<script>
  function updateCartUI(cart) {
    const cartItems = document.getElementById('cart-items');
    const cartCount = document.getElementById('cart-count');
    cartItems.innerHTML = '';
    let totalQty = 0;

    for (const id in cart) {
        const item = cart[id];
        totalQty += item.quantity;
        cartItems.innerHTML += `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    ${item.name}
                    <span class="badge bg-primary rounded-pill">${item.quantity}</span>
                </div>
                <button class="btn btn-sm btn-danger" onclick="removeFromCart('${id}')">
                    <i class="fa fa-trash"></i>
                </button>
            </li>
        `;
    }

    cartCount.innerText = totalQty;
}

document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        const name = this.dataset.name;
        const price = this.dataset.price;

        fetch("/cart/add", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({
                id,
                name,
                price
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.cart) {
                updateCartUI(data.cart);
            }
        });
    });
});
function loadCartFromServer() {
    fetch("/cart/data")
        .then(res => res.json())
        .then(data => {
            if (data.cart) {
                updateCartUI(data.cart);
            }
        });
}
function toggleCartDetails() {
    const cartDetail = document.getElementById('cart-details');
    if (cartDetail.style.display === 'none' || cartDetail.style.display === '') {
        cartDetail.style.display = 'block';
    } else {
        cartDetail.style.display = 'none';
    }
}
function removeFromCart(id) {
    fetch("/cart/remove", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        },
        body: JSON.stringify({ id })
    })
    .then(res => res.json())
    .then(data => {
        if (data.cart) {
            updateCartUI(data.cart);
        }
    });
}
loadCartFromServer();

</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>

</body>

</html>
