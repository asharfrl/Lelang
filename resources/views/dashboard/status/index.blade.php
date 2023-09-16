@extends('dashboard.layout')

@section('content')
<main class="main-content position-relative border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder text-white mt-4 mb-0">Status Lelang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->level }}</h6>
      </nav>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-end">
                <div>
                  <a href="{{ route('status.create') }}" class="btn btn-sm mb-0 me-1 btn-success">Create</a>
                </div>
            </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mt-4 mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xs font-weight-bolder">No</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Barang</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Tanggal</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Foto</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Status</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($status as $row)
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
                      <img src="{{ asset('img/'.$row->foto) }}" width="100px" style="border-radius: 10px;">
                      </td>
                      <td class="text-xs font-weight-bolder">
                        @if ($row->status === 'Buka')
                            <button class="btn btn-sm text-white" style="background-color: #055E68">
                                Lelang Dibuka
                            </button>
                        @elseif ($row->status === 'Tutup')
                            <button class="btn btn-sm btn-secondary">
                                Lelang Ditutup
                            </button>
                        @endif
                      </td>
                      <td class="text-xs font-weight-bolder">
                        <a href="" class="btn btn-sm mb-0 me-1 btn-success"></a>
                      </td>
                    </tr>
                  @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-end">
            <div>
              <h6 class="font-weight-bolder text-black mt-4 mb-0">History Lelang</h6>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mt-4 mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xs font-weight-bolder">No</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Barang</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Tanggal</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Penawar Tertinggi</th>
                    <th class="text-uppercase text-xs font-weight-bolder"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($status as $row)
                    <tr>
                      <td class="text-xs font-weight-bolder">
                        {{ $loop->iteration }}
                      </td>
                      <td class="text-xs font-weight-bolder">
                      </td>
                      <td class="text-xs font-weight-bolder">
                      </td>
                      <td class="text-xs font-weight-bolder">
                      </td>
                      <td class="text-xs font-weight-bolder">
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</main>
@endsection
