<div class="container">
  {{-- Desktop --}}
  <nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom d-none d-md-flex">
    <div class="col-md-3 mb-2 mb-md-0">
      <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img class="bi" src="{{ asset('images/logo-tuku-madang.png') }}" alt="" srcset="" height="40px">
      </a>
    </div>
    <div class="col-md-3 text-end">
      <a href="{{ route('auth.login') }}"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
      <a href="{{ route('auth.register') }}"><button type="button" class="btn btn-primary">Register</button></a>
    </div>
  </nav>

  {{-- Mobile --}}
  <nav class="navbar border-bottom d-block d-md-none">
    <div class="container-fluid">
      <a href="/" class="navbar-brand d-inline-flex link-body-emphasis text-decoration-none">
        <img class="bi" src="{{ asset('images/logo-tuku-madang.png') }}" alt="" srcset="" height="30px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn btn-outline-primary me-2">Login</button>
          <button type="button" class="btn btn-primary">Register</button>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        </div>
      </div>
    </div>
  </nav>
</div>
