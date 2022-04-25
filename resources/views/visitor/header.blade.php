<!-- Top Bar -->
<header>
    <div class="container_header">
        <div class="log_head">
            <img class="logo" src="{{ asset('images/home/logo_utama.png') }}" alt="logo">
        <a class="topbar-brand" href="/">AntiNganggur</a>
        </div>
        {{-- <div class="log_btn">
            @if (auth('applicant')->check() || auth('company')->check())
        @auth('applicant')
        <a href="/profil_user" class="tombol1">Profil</a>
        <a href="/logout?type=applicant" class="tombol2">Keluar</a>
        @endauth
        @auth('company')
        <a href="/profil_perusahaan" class="tombol1">Profil</a>
        <a href="/logout?type=company" class="tombol2">Keluar</a>
        @endauth
        @else
        <a href="/login?type=applicant" class="tombol1">Pelamar</a>
        <a href="/login?type=company" class="tombol2">Perusahaan</a>
        @endif
        </div> --}}
        
    </div>
</header>
<!-- Akhir Top Bar -->

<!-- Navbar -->
{{-- <nav class="navbar nav__links">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar">
        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
        @auth('company')
        <li class="nav-item"><a class="nav-link" href="/profil_perusahaan/iklan/buat">Pasang Lowongan Kerja</a></li>
        @endauth
        <li class="nav-item"><a class="nav-link" href="/company/list">Cari Perusahaan</a></li>
        <li class="nav-item"><a class="nav-link" href="/iklan">Cari Lowongan Kerja</a></li>
        <li class="nav-item"><a class="nav-link" href="/magang">Magang</a></li>
        <li class="nav-item"><a class="nav-link" href="/beasiswa">Beasiswa</a></li>
    </ul>
    </div>
</nav> --}}
<nav class="navbar navbar-expand-lg navbar-dark nav__links">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Beranda</a>
        </li>
        @auth('company')
        <li class="nav-item">
          <a class="nav-link" href="/profil_perusahaan/iklan/buat">Pasang Lowongan Kerja</a>
        </li>
        @endauth
        <li class="nav-item">
            <a class="nav-link" href="/company/list">Cari Perusahaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/iklan">Cari Lowongan Kerja</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/magang">Magang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/beasiswa">Beasiswa</a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> --}}
        
      </ul>
      <div class="form-inline my-2 my-lg-2">
        @if (auth('applicant')->check() || auth('company')->check())
        @auth('applicant')
        <a href="/profil_user" class="tombol1">Profil</a>
        <a href="/logout?type=applicant" class="tombol2">Keluar</a>
        @endauth
        @auth('company')
        <a href="/profil_perusahaan" class="tombol1">Profil</a>
        <a href="/logout?type=company" class="tombol2">Keluar</a>
        @endauth
        @else
        <a href="/login?type=applicant" class="tombol1">Pelamar</a>
        <a href="/login?type=company" class="tombol2">Perusahaan</a>
        @endif
      </div>
      
      {{-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
    </div>
  </nav>
<!-- Akhir Navbar -->