<div class="container">
    {{-- Desktop --}}
    <nav
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom d-none d-md-flex">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img class="bi" src="{{ asset('images/logo-tuku-madang.png') }}" alt="" srcset=""
                    height="40px">
            </a>
        </div>
        <div class="col-md-3 text-end">
            @auth
                 <div class="dropdown d-inline-flex align-items-center gap-2">
                <span>Hi, {{ Auth::user()->name }}</span>
                <a href="#" class="text-decoration-none" role="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('pesanan.saya') }}">Pesanan Saya</a></li>
                    <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
                <a href="{{ route('auth.login') }}"><button type="button"
                        class="btn btn-outline-primary me-2">Login</button></a>
                <a href="{{ route('auth.register') }}"><button type="button" class="btn btn-primary">Register</button></a>
            @endauth
        </div>
    </nav>

    {{-- Mobile --}}
    <nav class="navbar border-bottom d-block d-md-none">
        <div class="container-fluid">
            <a href="/" class="navbar-brand d-inline-flex link-body-emphasis text-decoration-none">
                <img class="bi" src="{{ asset('images/logo-tuku-madang.png') }}" alt="" srcset=""
                    height="30px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  @auth
                    <div class="d-flex flex-column">
                        <h5 class="mb-0">Hi, {{ Auth::user()->name }}</h5>
                        <small class="text-muted">Selamat datang kembali</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    
                    @else
                    <a href="{{ route('auth.login') }}"><button type="button"
                            class="btn btn-outline-primary me-2">Login</button></a>
                    <a href="{{ route('auth.register') }}"><button type="button"
                            class="btn btn-primary">Register</button></a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  @endauth
                </div>
                <div class="offcanvas-body">
                  @auth
                     <ul class="list-group list-group-flush w-100">
                        <li class="list-group-item border-0 px-0">
                            <a href="{{ route('profile') }}" class="d-flex align-items-center text-decoration-none text-dark">
                                <i class="bi bi-person me-2 fs-5"></i> Profil
                            </a>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <a href="{{ route('pesanan.saya') }}" class="d-flex align-items-center text-decoration-none text-dark">
                                <i class="bi bi-cart me-2 fs-5"></i> Pesanan Saya
                            </a>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                <i class="bi bi-gear me-2 fs-5"></i> Pengaturan
                            </a>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                <button type="submit" class="btn btn-link text-danger d-flex align-items-center p-0">
                                    <i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                @endauth
                </div>
            </div>
        </div>
    </nav>

</div>
