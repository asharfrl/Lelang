  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/masyarakat">Lelang Online<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        {{-- @if (session('success'))
            <div class="mt-4 ms-3 me-3 text-light fw-bold alert alert-success" role="alert">
                {{ session ('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Lelang</a></li>
          <li class="dropdown">
            <a href="#">
                <i class="fa fa-user me-1" style="font-size: 20px;"></i>
                <span>{{ Auth::user()->nama_petugas }}</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
                <li><a href="/">Sign Out</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
