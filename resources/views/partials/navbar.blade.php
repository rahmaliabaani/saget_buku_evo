{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="/">Saget</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link {{ ($active === "beranda") ? 'active' : '' }}" href="/">Beranda</a>
        <a class="nav-link {{ ($active === "buku") ? 'active' : '' }}" href="/buku">Buku</a>
        <a class="nav-link {{ ($active === "info") ? 'active' : '' }}" href="/info">Info</a>
        <a class="nav-link {{ ($active === "kategori") ? 'active' : '' }}" href="/kategori">Kategori</a>
      </div>

      <div class="navbar-nav ms-auto">
          {{-- @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else   --}}
            
          {{-- @endauth --}}
                    @guest
                    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 text-light" style="text-decoration : none;">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 text-light" style="text-decoration : none;">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 text-light" style="text-decoration : none;">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
                    @endguest
      </div>
      
    </div>
  </div>
</nav>