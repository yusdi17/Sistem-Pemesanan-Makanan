@extends('profile.index')
@section('title', 'Edit Profile')

@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a style="text-decoration: none;" href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a style="text-decoration: none;" href="{{ route('profile') }}">User Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama Lengkap</p>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">WhatsApp</p>
                </div>
                <div class="col-sm-9">
                  <input type="tel" name="phone" class="form-control" value="{{ Auth::user()->phone }}" />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}" />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-4 mt-2">
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>