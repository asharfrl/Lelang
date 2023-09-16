<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets-ds/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets-ds/img/icons8.png">
  <title>
    LELANG | {{ Auth::user()->level }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Nucleo Icons -->
  <link href="/assets-ds/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets-ds/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets-ds/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets-ds/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

  <style>
    .sidenav {
        background-color: white;
        width: 250px; /* Lebar sidebar */
        max-height: 70vh; /* Tinggi maksimal sidebar */
        overflow-y: auto; /* Aktifkan scroll jika kontennya melebihi tinggi maksimal */
        border: none;
        border-radius: 15px;
        position: fixed;
        top: 10px;
        left: 20px;
    }

    .bg {
        background-color:#4B70E2;
        opacity: 80%;
    }

    .admin-text {
    color: blue;
    }

    .petugas-text {
        color: green;
    }

    .masyarakat-text {
        color: red;
    }
</style>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="bg min-height-300 position-absolute w-100"></div>

  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/dashboard" target="_blank">
        <img src="/assets-ds/img/icons8.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-3 font-weight-bold">LELANG ONLINE</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @if (auth()->user()->level == 'Admin')
        <li class="nav-item">
          <a class="nav-link" href="/dataPetugas">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Akun</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dataBarang">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bullet-list-67 text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Barang</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/laporan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-print text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Generate Laporan</span>
          </a>
        </li>
        @endif

        @if (auth()->user()->level == 'Petugas' )
        <li class="nav-item">
          <a class="nav-link" href="/dataBarang">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bullet-list-67 text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Barang</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/laporan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-print text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Generate Laporan</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="/status">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-balance-scale text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Status Lelang</span>
          </a>
        </li> --}}
        @endif

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Menu</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-laptop text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  @yield('content')

  <!--   Core JS Files   -->
  <script src="/assets-ds/js/core/popper.min.js"></script>
  <script src="/assets-ds/js/core/bootstrap.min.js"></script>
  <script src="/assets-ds/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets-ds/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets-ds/js/plugins/chartjs.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets-ds/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function hapusData(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Data ini akan dihapus!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Jika pengguna mengonfirmasi, kirimkan formulir untuk menghapus data
          document.getElementById('delete-form-' + id).submit();
        }
      });
    }
 </script>
</body>

</html>
