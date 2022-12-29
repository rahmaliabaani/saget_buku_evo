@extends('layouts.main')

@section('container')
    <header>
        <div class="container mt-3 mb-5">
            <div class="row">
                <div class="col-lg-10">
                    {{-- Gambar BG --}}
                    <h1>Informasi Tim Saget</h1>
                    <p>Kami adalah mahasiswa semester 5 Teknik Informatika yang memiliki Tugas Besar Website Application dengan mengangkat tema Resensi Buku yang akan memberikan rekomendasi Buku dalam rangka meningkatkan minat baca sobat Saget.
                </div>
            </div>
        </div>  
    </header>

    {{-- daftar anggota --}}
    <section>
      <div class="container">
        <div class="row">
        @foreach($informasi as $info)
          <div class="col-lg-3">
            
              <!-- <div class="card" style="width: 18rem;"> -->
                <img src="img/{{ $info->gambar }}" class="card-img-top img-profil rounded-5 shadow-lg mt-5" alt="...">
                <div class="card-body mt-5 text-center">
                  <h5 class="card-title">{{ $info->name }}</h5>
                  <h6 class="card-title">{{ $info->email }}</h6>
                </div>
              <!-- </div> -->
            
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection