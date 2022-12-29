{{-- Tampilan Daftar Resensi Buku Seluruhnya --}}
@extends('layouts.main')

@section('container')
<div class="container mt-3">
<div class="">
<h2 class="text-center">{{ $title }}</h2>
</div>

<!-- <div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/buku">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit">Search</button>
        </div>
        </form>
    </div>
</div> -->



     @foreach ($posts as $post)
     <div class="card">
        <article class="mb-5 border-bottom pb-3">
            <img src="https://source.unsplash.com/500x400/?{{ $post->kategori->nama }}" class="mb-4" alt="">

            <h2>
                <a href="/buku/{{ $post->slug }}" class="text-decoration-none">{{ $post->judul }}</a>
            </h2>

            <h6>Dari. <a href="/penulis/{{ $post->penulis->username }}" class="text-decoration-none">{{ $post->penulis->name }}</a> | <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->nama }}</a></h6>

            <p>{{ $post->kutipan }}</p>
            
            <a href="/buku/{{ $post->slug }}" class="text-decoration-none">Baca lebih banyak..</a>
        </article>
    </div>
     @endforeach


@endsection

