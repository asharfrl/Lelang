@extends('dashboard.layout')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Edit Data Siswa</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('dataSiswa.update', $siswa->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NISN</label>
                                        <input class="form-control" name="nisn" id="nisn" type="number" placeholder="Masukkan nisn ..." value="{{ old('nisn', $siswa->nisn) }}" required autofocus>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NIS</label>
                                        <input class="form-control" name="nis" id="nis" type="number" placeholder="Masukkan nis ..." value="{{ old('nis', $siswa->nis) }}" required>
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input class="form-control" name="nama" id="nama" type="text" placeholder="Masukkan nama ..." value="{{ old('nama', $siswa->nama) }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kelas</label>
                                        <select class="form-control" name="kelas" id="kelas" value="{{ old('kelas') }}" required>
                                            @foreach($id_kelas as $kelas)
                                                <option value="{{$kelas->nama_kelas}}" @if($siswa->nama_kelas == $kelas->nama_kelas)selected @endif>{{$kelas->nama_kelas}}</option>
                                            @endforeach
                                        </select>
                                        @error('kelas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat ..." value="{{ old('alamat', $siswa->alamat) }}" required></textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">No Telp</label>
                                        <input class="form-control" name="no_telp" id="no_telp" type="number" placeholder="Masukkan no_telp ..." value="{{ old('no_telp', $siswa->no_telp) }}" required>
                                        @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">SPP</label>
                                        <select class="form-control" name="id_spp" id="id_spp" value="{{ old('id_spp') }}" required>
                                            @foreach($id_spp as $spp)
                                                <option value="{{$spp->nominal}}" @if($siswa->nominal == $spp->nominal)selected @endif>{{ number_format($spp->nominal) }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_spp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary btn-sm me-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection