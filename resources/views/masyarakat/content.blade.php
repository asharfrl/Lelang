 <style>
    .time-up {
    border-color: red; /* Mengubah warna border menjadi merah */
    /* Gaya lain sesuai kebutuhan */
    }

    .closed-text {
    position: absolute;
    background-color: red;
    color: white;
    padding: 5px;
    border-radius: 5px;
    font-size: 14px;
    top: 10px;
    left: 10px;
    width: 80%;
    font-style: italic;
    font-family: 'Courier New', monospace;
    text-align: center;
    }

    .portfolio-image {
    border: 2px solid #106EEA;
    border-radius: 15px;
    max-width: 300px; /* Atur lebar maksimum gambar di sini */
    height: auto; /* Biarkan tinggi mengikuti proporsi aspek */
    /* Anda juga dapat menambahkan properti CSS lain sesuai kebutuhan Anda */
    }

    /* Menggunakan media query untuk responsif */
    @media (max-width: 768px) {
        .closed-text {
            width: 90%; /* Atur ulang lebar teks untuk layar yang lebih kecil */
            font-size: 12px; /* Atur ulang ukuran font untuk layar yang lebih kecil */
        }
    }
 </style>

 <!-- ======= Hero Section ======= -->


  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        @if (session('success'))
          <div>
              <div class="mt-4 ms-3 me-3 text-black fw-bold alert alert-info" role="alert" style="text-align: center;">
                  {{ session ('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          </div>
        @endif
      <h1>Selamat Datang Di <span>Lelang</span></h1>
      <h2>Kami Menyediakan Barang Lelang Mulai Dari <span>Rp. 0</span></h2>
      <div class="d-flex">
        <a href="#portfolio" class="btn-get-started scrollto">Mulai</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg" style="background-image: url('path-to-your-image.jpg');">
        <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Tentang</h2>
          <h3>Apa Itu <span>Lelang ?</span></h3>
          <p>Lelang adalah penjualan barang yang terbuka untuk umum dengan penawaran harga secara tertulis.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="BizLand/assets/img/ilu_lelangonline.804187d.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>Tujuan Dari Lelang</h5>
                  <p>Untuk menjual barang atau jasa dengan cepat. Dengan persaingan perdagangan yang makin ketat saat ini, untuk jualan kita butuh promosi yang tepat. Lewat pelelangan, barang bisa dipromosikan ke banyak orang dengan lebih mudah.</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Apa Saja Yang Dilelang</h5>
                  <p>Jenis barang yang dapat dilelang sendiri saat sangat luas, yaitu semua jenis benda atau hak yang dapat dijual secara lelang. Barang tidak berwujud meliputi hak menikmati, hak tagih, termasuk hak kekayaan intelektual, hak siar, dan surat berharga juga termasuk barang yang dapat dilelang.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>LELANG</h2>
          <h3>Pilih Barang Yang Anda <span>Sukai</span></h3>
          <p>Ikuti Pelelangan Pada Barang Yang Tersedia Dan Jadi Sebagai Penawar Tertinggi</p>
        </div>

        {{-- @foreach($barang as $row)
        @php
            $waktuHabis = \Carbon\Carbon::parse($row->tgl);
            $sekarang = \Carbon\Carbon::now();

            // Jika waktu habis sudah lewat, maka skip barang ini
            if ($sekarang > $waktuHabis) {
                continue;
            }
        @endphp
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{ asset('img/'.$row->foto) }}" class="img-fluid" alt="" width="300" style="border: 2px solid #106EEA; border-radius: 15px;">
                <div class="portfolio-info">
                    <h4>{{ $row->nama_barang }}</h4>
                    <a href="{{ asset('img/'.$row->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Waktu Habis : {{ $row->tgl->locale('id')->isoFormat('D MMMM YYYY H:mm') }}"><i class="bx bx-plus"></i></a>
                    <a href="{{route('lelang.show', $row->id)}}" class="details-link" title="Ikuti Lelang"><i class="bx bx-chevron-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach --}}

        {{-- @foreach($barang as $row)
            @php
                $waktuHabis = \Carbon\Carbon::parse($row->tgl);
                $sekarang = \Carbon\Carbon::now();
            @endphp

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset('img/'.$row->foto) }}" class="img-fluid" alt="" width="300" style="border: 2px solid #106EEA; border-radius: 15px;">
                    <div class="portfolio-info">
                        <h4>{{ $row->nama_barang }}</h4>
                        <a href="{{ asset('img/'.$row->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Waktu Habis : {{ $row->tgl->locale('id')->isoFormat('D MMMM YYYY H:mm') }}"><i class="bx bx-plus"></i></a>
                        @if ($sekarang <= $waktuHabis)
                            <a href="{{route('lelang.show', $row->id)}}" class="details-link" title="Ikuti Lelang"><i class="bx bx-chevron-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach --}}

        @foreach($barang as $row)
            @php
                $waktuHabis = \Carbon\Carbon::parse($row->tgl);
                $sekarang = \Carbon\Carbon::now();
                $lelangDitutup = $sekarang > $waktuHabis;
            @endphp

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="closed-container">
                        @if ($lelangDitutup)
                            <div class="closed-text">
                                TAWARAN SUDAH DITUTUP
                            </div>
                        @endif
                    </div>
                    <img src="{{ asset('img/'.$row->foto) }}" class="img-fluid portfolio-image {{ $lelangDitutup ? 'time-up' : '' }}" alt="">
                    <div class="portfolio-info light"  style="border-radius: 15px;">
                        <h4>
                            {{ $row->nama_barang }}
                        </h4>
                        @if ($lelangDitutup)
                            <h4 style="color:#ff0000">
                                Waktu Sudah Habis
                            </h4>
                        @endif
                        <a href="{{ asset('img/'.$row->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Waktu Habis : {{ $row->tgl->locale('id')->isoFormat('D MMMM YYYY H:mm') }}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('lelang.show', $row->id)}}" class="details-link" title="Ikuti Lelang"><i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
        @endforeach
            </div>
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

