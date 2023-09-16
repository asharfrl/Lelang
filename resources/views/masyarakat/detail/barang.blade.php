@include('masyarakat.header')

@yield('content')
<style>
    .logo a {
        color: black;
    }

        /* Style for the input field */
        #tawar-barang {
        width: 100%; /* Lebar 100% dari kolom parent */
        padding: 15px; /* Ruang bantalan di dalam input */
        border: 1px solid #ccc; /* Garis batas dengan warna abu-abu */
        border-radius: 5px; /* Sudut sudut sedikit melengkung */
        font-size: 16px; /* Ukuran font */
    }

    .portfolio-details-slider .swiper-slide img {
    border: 2px solid #000;
    }

    /* Tampilan tanggal */
    #date {
        font-size: 18px; /* Ukuran font tanggal */
        color: #333; /* Warna teks tanggal */
        font-weight: bold; /* Ketebalan teks tanggal */
        text-align: center; /* Pusatkan teks tanggal */
    }

    /* Tampilan jam */
    #clock {
    font-size: 24px; /* Ukuran font jam */
    color: #333; /* Warna teks jam */
    font-weight: bold; /* Ketebalan teks jam */
    text-align: center; /* Pusatkan teks jam */
    }

    /* Tampilan detik */
    #s {
        color: #ff0000; /* Warna teks detik (misalnya merah) */
    }

    #pesan-waktu-lewat {
        background-color: #f44336; /* Warna latar merah */
        color: white; /* Warna teks putih */
        padding: 5px; /* Ruang dalam pesan */
        border-radius: 5px; /* Sudut elemen bulat */
        text-align: center; /* Teks rata tengah */
        font-weight: bold; /* Teks tebal */
    }

    .custom-font {
        font-family: "Arial, Helvetica, sans-serif"; /* Ganti dengan font yang Anda inginkan */
    }
</style>

<main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs Section ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo"><a href="/masyarakat">Lelang Online<span>.</span></a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown">
                    <a href="#">
                        <i class="fa fa-user me-1" style="font-size: 20px;"></i>
                        <span>{{ Auth::user()->nama_petugas }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a href="javascript:history.back()">Kembali</a></li>
                        <li><a href="/">Sign Out</a></li>
                    </ul>
                  </li>
            </ul>
        </nav>
    </header>
    {{-- <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfolio Details</h2>
          <ol>
            <li>Portfolio Details</li>
          </ol>
        </div>
      </div> --}}
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    @if ($terLelang)
                    <div class="alert alert-light custom-font" style="text-align: center; padding: 2px; border-radius: 15px; background: linear-gradient(to right, #106EEA, #64B5F6); box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                        <h5 style="margin: 0; color: white;">
                            <b style="display: inline-block; font-style: italic; font-family: 'Courier New', monospace;">Tawaran Tertinggi :</b>
                            <strong><small style="color: rgb(255, 255, 255); font-size: 20px; display: inline-block; text-align: center; font-style: italic; font-family: 'Courier New', monospace;">Rp. {{ number_format($terLelang->harga_akhir, 0, ',', '.') }}</small></strong>
                        </h5>
                        <h5 style="margin: 5px 0 0; color: white;">
                            <b style="display: inline-block; font-style: italic; font-family: 'Courier New', monospace;">Oleh :</b>
                            <strong><small style="color: rgb(255, 255, 255); font-size: 20px; display: inline-block; text-align: center; font-style: italic; font-family: 'Courier New', monospace;">{{ $terLelang->nama_petugas }}</small></strong>
                        </h5>
                        <h5 style="margin: 5px 0 0; color: white;">
                            <b style="display: inline-block; font-style: italic; font-family: 'Courier New', monospace;">Pada :</b>
                            <strong><small style="color: rgb(255, 252, 252); font-size: 20px; display: inline-block; text-align: center; font-style: italic; font-family: 'Courier New', monospace;">{{ $terLelang->created_at->locale('id')->isoFormat('D MMMM YYYY H:mm') }}</small></strong>
                        </h5>
                    </div>
                    @else
                    {{-- <div class="alert alert-light" style="text-align: center; color: white; background-color: #106EEA; padding: 15px; border-radius: 5px;">
                            <h5 style="margin: 0;">
                                <b style="display: inline-block;">Tawaran Tertinggi :</b>
                            </h5>
                            <h5 style="margin: 0;">
                                <b style="display: inline-block;">Oleh :</b>
                            </h5>
                            <h5 style="margin: 0;">
                                <b style="display: inline-block;">Pada :</b>
                            </h5>
                    </div> --}}
                    @endif
                    <div class="portfolio-details-slider swiper">
                        <div class="portfolio">
                            <div  class="swiper-wrapper align-items-center" data-aos="fade-up" data-aos-delay="200">
                                <div class=" portfolio-item">
                                    <img src="{{ asset('img/'.$barang->foto) }}" alt="" style="padding: 3px; border: 2px solid #106EEA; border-radius: 30px;">
                                    <div class="portfolio-info light" style="background: linear-gradient(to right, #106EEA, #64B5F6); border-radius: 15px;">
                                        <h4 style="color: rgb(255, 255, 255); text-align: center; padding: 5px; font-style: italic; font-family: 'Courier New', monospace; font-family: 'Times New Roman', serif;">{{ $barang->nama_barang }}</h4>
                                        <a href="{{ asset('img/'.$barang->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus" style="color: rgb(255, 255, 255);"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info section-bg">
                        <div id="date">
                            <?php
                                date_default_timezone_set('Asia/Jakarta');
                                setlocale(LC_TIME, 'id_ID'); // Set bahasa dan lokalisasi ke Indonesia
                                echo strftime('%d %B %Y');
                                echo '<div id="clock"> <i id="h"></i> : <i id="m"></i> : <i id="s"></i> </div>';
                            ?>
                        </div>
                        <br>
                        @if ($errors->any())
                            <div style="background-color: #ff0000c8; color: white; padding: 1px; border-radius: 5px; text-align: center;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif (session('success'))
                            <div class="alert alert-light" style="background-color: #00ff1edd; color: white; padding: 3px; border-radius: 5px; text-align: center;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h3>Informasi Barang</h3>
                        <div style="text-align: center;">
                            <h6><b>JADWAL TUTUP LELANG:</b><br>
                            <small style="color: red; font-size: 15px; display: block; text-align: center; margin: 0 auto;"><b>{{ $barang->tgl->locale('id')->isoFormat('D MMMM YYYY H:mm') }}</b></small></h6>
                        </div>

                        <ul>
                            <li><strong>Nama Barang</strong>&nbsp;&nbsp;:&nbsp;{{ $barang->nama_barang }}</li>
                            <li><strong>Harga Awal</strong>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:&nbsp;<span id="harga" data-harga="{{ number_format($barang->harga_awal, 0, ',', '.') }}">
                                <b>Rp.</b>&nbsp;{{ number_format($barang->harga_awal, 0, ',', '.') }}
                            </span></li>
                            <li>
                                <strong>Deskripsi</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
                                <span style="max-width: 300px; display: inline-block; word-wrap: break-word;">
                                    {{ $barang->deskripsi_barang }}
                                </span>
                            </li>
                            <br>
                            @if(Carbon\Carbon::now() > $barang->tgl)
                                <div class="alert alert-danger" style="background-color: #ff0000c8; color: #ffffff;  text-align: center; display: flex; justify-content: center; align-items: center; height: 50px;">
                                        <b>Tawaran Sudah Ditutup</b>
                                </div>
                            @else
                                <!-- Your bid form and other content related to the ongoing auction can go here -->
                                <div class="mt-4">
                                    <form action="{{ route('lelang.store', $barang->id) }}" method="POST">
                                        @csrf
                                        <label for="bid_amount"><strong>Tawar Barang:</strong></label>
                                        <input type="number" name="barang_id" id="barang_id" value="{{ $barang->id }}" hidden>
                                        <input type="datetime-local" name="tgl" id="tgl" value="{{ $barang->tgl }}" hidden>
                                        <input type="number" name="harga_awal" id="harga_awal" value="{{ $barang->harga_awal }}" hidden>
                                        @if ($terLelang)
                                            <input type="number" min="{{ $terLelang->harga_akhir }}" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Tawaran Anda Harus Lebih Besar Dari Harga Tertinggi')" name="harga_akhir" class="form-control mb-2" placeholder="Tawaran Anda" required="">
                                        @else
                                            <input type="number" min="{{ $barang->harga_awal }}" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Tawaran Anda Harus Lebih Besar Dari Harga Awal')" name="harga_akhir" class="form-control mb-2" placeholder="Tawaran Anda" required="">
                                        @endif
                                        <button type="submit" class="btn btn-light" style="background-color: #106EEA; color: white; width: 300px; padding: 5px;">Tawar</button>
                                    </form>
                                </div>
                            @endif
                            <br>
                            <br>
                            <div style="text-align: center;">
                                <h6><b>HISTORY LELANG:</b></h6>
                            </div>
                            <br>
                            <table>
                                <thead>
                                  <tr>
                                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">No</th>
                                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Penawar</th>
                                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Harga Tawar</th>
                                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Waktu</th>
                                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($berLelang as $row)
                                        <tr>
                                            <td class="text-xs font-weight-bolder">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-xs font-weight-bolder" style="text-align: center;">
                                                {{ $row->nama_petugas }}
                                            </td>
                                            <td class="text-xs font-weight-bolder" style="color: red; text-align: center;">
                                                Rp. {{ number_format($row->harga_akhir, 0, ',', '.') }}
                                            </td>
                                            <td class="text-xs font-weight-bolder" style="text-align: center;">
                                                {{ $row->created_at->locale('id')->isoFormat('H:mm') }}
                                            </td>
                                            <td class="text-xs font-weight-bolder">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            {{-- <div id="pesan-waktu-lewat" style="display: none;">
                                <p>Sudah Melewati Waktu. Tidak dapat melakukan penawaran lagi.</p>
                            </div> --}}
                            <br>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->
<script>
    function updateTime() {
        var now = new Date();
        var h = now.getHours();
        var m = now.getMinutes();
        var s = now.getSeconds();

        document.getElementById("h").textContent = (h < 10 ? "0" : "") + h;
        document.getElementById("m").textContent = (m < 10 ? "0" : "") + m;
        document.getElementById("s").textContent = (s < 10 ? "0" : "") + s;
    }

    setInterval(updateTime, 1000); // Update waktu setiap 1 detik

    // Ambil waktu tutup lelang dari server (misalnya, dalam format timestamp)
    var waktuTutup = {{ $barang->tgl->timestamp * 1000 }}; // Ubah ke milidetik

     // Ambil waktu tutup lelang dari server (misalnya, dalam format timestamp)
     var waktuTutup = {{ $barang->tgl->timestamp * 1000 }}; // Ubah ke milidetik

    // Fungsi untuk memeriksa waktu
    function periksaWaktu() {
        var sekarang = Date.now();

        if (sekarang >= waktuTutup) {
            // Jika waktu sudah lewat, sembunyikan formulir dan tampilkan pesan
            document.getElementById('tawar-label').style.display = 'none';
            document.getElementById('tawar-form').style.display = 'none';
            document.getElementById('pesan-waktu-lewat').style.display = 'block';
        } else {
            // Jika masih ada waktu, tampilkan formulir dan sembunyikan pesan
            document.getElementById('tawar-label').style.display = 'block';
            document.getElementById('tawar-form').style.display = 'block';
            document.getElementById('pesan-waktu-lewat').style.display = 'none';
        }
    }

    // Jalankan periksaWaktu saat halaman dimuat
    window.onload = periksaWaktu;

    var hargaElemen = document.getElementById('harga');
    var harga = hargaElemen.getAttribute('data-harga');
    hargaElemen.setAttribute('title', 'Harga: ' + harga);

    function updateMinValue(inputElement) {
        // Mendapatkan nilai tawaran tertinggi yang baru
        let terLelangValue = parseFloat(inputElement.value);

        // Memperbarui atribut min pada elemen input
        inputElement.min = terLelangValue;
    }
</script>
@include('masyarakat.footer')

