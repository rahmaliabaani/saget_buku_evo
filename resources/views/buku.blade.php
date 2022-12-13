{{-- Tampilan Daftar Resensi Buku Seluruhnya --}}
@extends('layouts.main')

@section('container')
<h1>{{ $title }}</h1>
    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-3">
            <img src="https://source.unsplash.com/500x400/?{{ $post->kategori->nama }}" class="mb-4" alt="">

            <h2>
                <a href="/buku/{{ $post->slug }}" class="text-decoration-none">{{ $post->judul }}</a>
            </h2>

            <h6>Dari. <a href="/penulis/{{ $post->penulis->username }}" class="text-decoration-none">{{ $post->penulis->name }}</a> | <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->nama }}</a></h6>

            <p>{{ $post->kutipan }}</p>
            
            <a href="/buku/{{ $post->slug }}" class="text-decoration-none">Baca lebih banyak..</a>
        </article>
    @endforeach   
@endsection

