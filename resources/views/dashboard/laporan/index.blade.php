@extends('dashboard.layout')

@section('content')
<main class="main-content position-relative border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder text-white mt-4 mb-0">Generate Laporan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;{{ Auth::user()->level }}</h6>
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
                    <button class="btn btn-primary align-middle text-center text-sm" onclick="window.print()">Print</button>
                </div>
              </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mt-4 mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Foto Barang</th>
                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Nama Barang</th>
                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Penawar Tertinggi</th>
                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Harga Tawar</th>
                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;">Tanggal </th>
                    <th class="text-uppercase text-xs font-weight-bolder" style="text-align: center;"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $item)
                        <tr>
                            <td class="text-xs font-weight-bolder">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-xs font-weight-bolder" style="text-align: center;">
                                <a href="{{ asset('img/'.$item->foto) }}" target="_blank" data-toggle="modal" data-target="#imageModal">
                                    <img src="{{ asset('img/'.$item->foto) }}" width="100px" style="border-radius: 10px;">
                                </a>
                            </td>
                            <td class="text-xs font-weight-bolder" style="text-align: center;">
                                {{ $item->nama_barang }}
                            </td>
                            <td class="text-xs font-weight-bolder" style="text-align: center;">
                                {{ $item->nama_petugas }}
                            </td>
                            <td class="text-xs font-weight-bolder" style="color: red; text-align: center;">
                                Rp. {{ number_format($item->harga_akhir, 0, ',', '.') }}
                            </td>
                            <td class="text-xs font-weight-bolder" style="text-align: center;">
                                {{ $item->created_at }}
                            </td>
                            <td class="text-xs font-weight-bolder">
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
