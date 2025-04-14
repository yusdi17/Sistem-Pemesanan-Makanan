<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  </head>
  <body>
    <!-- Makanan -->

<div class="container px-4 py-5">
  <h2 class="pb-2 border-bottom">Menu</h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach ($products as $product)
      <div class="col">
        <div class="card shadow-sm">
          @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="bd-placeholder-img card-img-top" width="100%" height="225" style="object-fit: cover;">
          @endif

          <div class="card-body">
            <p class="card-text">{{ $product->name }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-cart-plus"></i></button>
              </div>
              <small class="text-body-secondary">Rp {{ number_format($product->price, 0, ',', '.') }}</small>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>