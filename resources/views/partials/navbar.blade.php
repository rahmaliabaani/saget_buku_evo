<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg bg-light shadow">
    <div class="container">
      <a class="navbar-brand" href="/">
      <img src="/img/logo.png" alt="Logo" width="50">  
      Saget
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "beranda") ? 'active' : '' }}" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "buku") ? 'active' : '' }}" href="/buku">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "info") ? 'active' : '' }}" href="/info">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "kategori") ? 'active' : '' }}" href="/kategori">Kategori</a>
          </li>
        </ul>
        
        <ul class="navbar-nav">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="/admin/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
          @else
          @guest
                    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500" style="text-decoration : none;">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 text-dark" style="text-decoration : none;">Masuk</a>
                    @endauth
                </div>
            @endif
        </div>
                    @endguest
          @endauth
        </ul>
      </div>
    </div>
</nav>