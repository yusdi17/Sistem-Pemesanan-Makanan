@section('title', 'Login')
@extends('auth.index')

@section('content')
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div data-mdb-input-init class="form-outline mb-4">
                  <input required type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Email"/>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input required type="password" name="password" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Password"/>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" data-mdb-button-init
                    data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="{{ route('auth.register') }}"
                    class="fw-bold text-body"><u>Register here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
