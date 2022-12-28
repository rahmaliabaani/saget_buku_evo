@extends('layouts.main')
@section('container')
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
          <div class="col-lg-5">
            <h1>Rekomendasi Buku</h1>
              <article class="mb-5">
                <img src="" class="mb-4" alt="">
                <h2>
                  <a href="" class="text-decoration-none">Buku</a>
                </h2>
                <h6>Dari. <a href="" class="text-decoration-none">Hamzah Hadi Putri</a> | <a href="" class="text-decoration-none">Hamzah</a></h6>
                Matematika yang maha kuasa itu lebih akurat BY : Caca Emile Supriana
              </article>
          </div>
        </div>
      </div>
    </section>

    {{-- Hak Cipta --}}
    <footer></footer>
@endsection