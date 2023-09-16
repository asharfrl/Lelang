@extends('dashboard.layout')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Edit Data Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->level }}</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('dataBarang.update', $barang->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Barang</label>
                                        <input class="form-control" name="nama_barang" id="nama_barang" type="text" placeholder="Masukkan Nama Barang ..." value="{{ old('nama_barang', $barang->nama_barang) }}" required autofocus>
                                        @error('nama_barang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tanggal Habis</label>
                                        <input class="form-control" name="tgl" id="tgl" type="datetime-local" placeholder="Masukkan Tanggal ..." value="{{ old('tgl', $barang->tgl) }}" required>
                                        @error('tgl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Harga</label>
                                        <input class="form-control" name="harga_awal" type="text" placeholder="Masukkan Harga ..." value="{{ old('harga_awal', $barang->harga_awal) }}">
                                        @error('harga_awal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                        <input class="form-control" name="deskripsi_barang" id="deskripsi_barang" type="text" placeholder="Masukkan Deskripsi Barang ..." value="{{ old('deskripsi_barang', $barang->deskripsi_barang) }}" required>
                                        @error('deskripsi_barang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Foto</label>
                                    <input class="form-control" name="foto" id="foto" type="file" placeholder="Masukkan Foto ..." value="{{ old('foto', $barang->foto) }}">
                                    @if($barang->foto)
                                        <img src="{{ asset('img/'.$barang->foto) }}" alt="Foto Barang" width="100px" style="border-radius: 10px;">
                                    @endif
                                    <br>
                                    <small style="color: red; font-size: 11px;"><b>(Foto Sebelumnya)</b></small>
                                    @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex justify-content-end mt-4">
                                <a href="javascript:history.back()" class="btn btn-danger btn-sm me-3">Kembali</a>
                                <button class="btn btn-primary btn-sm me-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function formatCurrencyInput(input) {
        const value = input.value.replace(/[^\d]/g, ''); // Menghapus karakter non-digit
        const formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Menambahkan titik sebagai pemisah ribuan
        const formattedDisplayValue = `Rp ${formattedValue}`; // Menambahkan "Rp" di depan angka
        input.value = formattedDisplayValue; // Menetapkan nilai yang sudah diformat ke value input
    }

    // Panggil formatCurrencyInput saat halaman dimuat
    window.onload = function() {
        const inputHarga = document.getElementById('harga_awal');
        formatCurrencyInput(inputHarga);
    };
</script>


@endsection
