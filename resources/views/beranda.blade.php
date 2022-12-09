@extends('layouts.main')

@section('container')
    {{-- Gambar dan Text --}}
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    {{-- Gambar BG --}}
                    <h1>Halo Sobat Saget!</h1>
                    <h5>Kami adalah Website Resensi Buku yang akan memberikan rekomendasi Buku yang sobat inginkan</h5>
                    <hr>
                    <h4>Selamat Membaca</h4>
                    <a href="/info" class="btn btn-primary" >Infomasi Tim</a>
                </div>
            </div>
        </div>
    </header>

    {{-- Rekomendasi Resensi Buku --}}
    <section>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Hak Cipta --}}
    <footer></footer>
@endsection
