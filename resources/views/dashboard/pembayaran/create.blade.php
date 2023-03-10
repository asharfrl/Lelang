@extends('dashboard.layout')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Create Data Pembayaran</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('dataPembayaran.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Petugas</label>
                                        <input class="form-control" name="id_petugas" id="id_petugas" type="text" value="{{ Auth()->user()->nama_petugas }}" readonly>
                                        @error('id_petugas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NISN</label>
                                        <select class="form-control" name="nisn" id="nisn" value="{{ old('nisn') }}" required autofocus>
                                            @foreach($nisn as $siswa)
                                                <option value="{{$siswa->nisn}}">{{$siswa->nisn}} - {{$siswa->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Bulan Dibayar</label>
                                        <input class="form-control" name="bulan_dibayar" id="bulan_dibayar" type="number" placeholder="Masukkan jumlah bulan dibayar ..." value="{{ old('bulan_dibayar') }}" required>
                                        @error('bulan_dibayar')
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
                                                <option value="{{$spp->nominal}}">{{ number_format($spp->nominal) }}</option>
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