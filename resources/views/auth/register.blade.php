@extends('auth.index')
@section('title', 'Register')

@section('content')
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form  method="POST" action="{{ route('register') }}">
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="nama" name="name" class="form-control form-control-lg" placeholder="Nama"/>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email"/>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="tel" id="wa" name="phone" class="form-control form-control-lg" placeholder="No WhatsApp"/>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="alamat" name="alamat" class="form-control form-control-lg" placeholder="Alamat Lengkap"/>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" placeholder="Konfirmasi Password"/>
                </div>

                <div class="d-flex justify-content-center">
                  <button  type="submit" data-mdb-button-init
                    data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{ route('auth.login') }}"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

