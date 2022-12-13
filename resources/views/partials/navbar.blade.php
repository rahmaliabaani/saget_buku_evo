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
            <a href="/masuk" class="nav-link {{ ($active === "masuk") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
          {{-- @endauth --}}
      </div>
      
    </div>
  </div>
</nav>