@extends('layouts.main')

@section('container')
  <!-- Jumbotron -->
    <div class="jumbotron">
      <div class="text-center bg-image">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">Halo Sobat Saget!</h1>
              <h6 class="mb-3">Selamat datang di website kami. <br> Saget merupakan website resensi buku yang akan memberikan rekomendasi buku yang sobat inginkan</h6>
              <a class="btn btn-outline-light btn-lg" href="/info" role="button">Informasi tim</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Selesai Jumbotron -->

  <!-- Rekomendasi Buku -->
    <div class="container">
      <div class="my-5">
        <h2 class="text-center">- Rekomendasi Buku -</h2>
      </div>
      <div class="row gx-2 mb-5">
          <div class="col-md-4 my-2 d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
              <img src="" class="card-img-top" alt="...">
              <div class="card-body">
                <h2><a href="" class="text-decoration-none">Buku</a></h2>
                <h6>Dari : <a href="/" class="text-decoration-none">Hamzah hadi permana</a> | <a href="" class="text-decoration-none">Beruang</a></h6>
                Ini adalah hari minggu
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection 
