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