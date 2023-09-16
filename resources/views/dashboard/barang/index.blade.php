@extends('dashboard.layout')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <style>
        .description-container {
    max-width: 300px; /* Sesuaikan dengan lebar maksimum yang Anda inginkan */
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    </style>

  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder text-white mt-4 mb-0">Data Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->level }}</h6>
      </nav>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          @if(session()->has('message'))
            <div class="mt-4 ms-3 me-3 text-light fw-bold alert alert-success" role="alert">
                {{ session('message') }}
            </div>
          @endif
          @if(session()->has('delete'))
            <div class="mt-4 ms-3 me-3 text-light fw-bold alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
          @endif
          <div class="card-header pb-0 d-flex justify-content-end">
            <div>
              <a href="/dataBarang/create" class="btn btn-sm mb-0 me-1 btn-success">Create</a>
              {{-- <input type="submit" class="btn card-submit btn-bold" style="color: white;" name="reset" value="Reset Auto Increment"> --}}
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mt-4 mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xs font-weight-bolder">No</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Nama Barang</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Tanggal Berakhir</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Harga</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Deskripsi Barang</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Foto</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($barang as $row)
                    <tr>
                      <td class="text-xs font-weight-bolder">
                        {{ $loop->iteration }}
                      </td>
                      <td class="text-xs font-weight-bolder">
                        {{ $row->nama_barang }}
                      </td>
                      <td class="text-xs font-weight-bolder">
                        {{ $row->tgl->format('d-m-Y H:i:s') }}
                      </td>
                      <td class="text-xs font-weight-bolder">
                        Rp {{ number_format($row->harga_awal, 0, ',', '.') }}
                      </td>
                      <td class="text-xs font-weight-bolder">
                        <div class="description-container">
                            {{ $row->deskripsi_barang }}
                        </div>
                      </td>
                      <td class="text-xs font-weight-bolder">
                        <img src="{{ asset('img/'.$row->foto) }}" width="100px" style="border-radius: 10px;">
                      </td>
                      <td class="text-xs font-weight-bolder">
                        <form id="delete-form-{{ $row->id }}" action="{{ route('dataBarang.destroy',$row->id) }}" method="POST">
                          <a href="{{ route('dataBarang.edit', $row->id) }}" class="btn btn-sm mb-0 me-1 btn-warning">Edit</a>
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-sm mb-0 me-1 btn-danger" onclick="hapusData({{ $row->id }})">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
