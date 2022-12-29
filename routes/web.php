<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome', [
        "title" => "Beranda",
        "active" => "beranda"
    ]);
});

Route::get('/info', function() {
    return view('info', [
        "title" => 'Info',
        "active" => 'info',
        'gambar' => 'farhan.jpg',
        'informasi' => User::all()
    ]);
});


Route::get('/kategori', function() {
    return view('kategoris', [
        'title' => 'Kategori Buku',
        'active' => 'kategori'
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

Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index']);

Route::get('buku/{post:slug}', [App\Http\Controllers\BukuController::class, 'show']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
