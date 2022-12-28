<?php

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Beranda
Route::get('/', function () {
    return view('beranda', [
        "title" => 'Beranda',
        "active" => 'beranda',
        "posts" => Buku::latest()->paginate(3)
    ]);
});

// Route Info
Route::get('/info', function () {
    return view('info', [
        "title" => 'Info',
        "active" => 'info',
        "informasi" => User::all()
    ]);
});

// Route Tampilan All Kategori
Route::get('/kategori', function() {
    return view('kategoris', [
        'title' => 'Kategori Buku',
        'active' => 'kategori',
        'kategoris' => Kategori::all()
    ]);
});

// Route PerKategori Buku
Route::get('/kategori/{kategori:slug}', function(Kategori $kategori) {
    return view('buku', [
        'title' => "Kategori Buku : $kategori->nama",
        'posts' => $kategori->buku->load('penulis', 'kategori'),
        'active' => 'kategori',
    ]);
});

// Route Halaman Buku Seluruhnya
Route::get('/buku', [BukuController::class, 'index']);

// Route Halaman PerBuku
Route::get('buku/{post:slug}', [BukuController::class, 'show']);


Route::get('/penulis/{penulis:username}', function(User $penulis) {
    return view('buku', [
        'title' => "Penulis Resensi : $penulis->name",
        'posts' => $penulis->buku->load('kategori', 'penulis'),
        'active' => 'buku'
    ]);
});

















Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/masuk',[App\Http\Controllers\Auth\LoginController::class, 'index']);

Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
