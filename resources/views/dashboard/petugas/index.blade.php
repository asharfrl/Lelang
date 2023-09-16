@extends('dashboard.layout')

@section('content')
<main class="main-content position-relative border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder text-white mt-4 mb-0">Data Akun&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->level }}</h6>
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
              <a href="/dataPetugas/create" class="btn btn-sm mb-0 me-1 btn-success">Create</a>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mt-4 mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xs font-weight-bolder">No</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Nama Petugas</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Level</th>
                    <th class="text-uppercase text-xs font-weight-bolder">Username</th>
                    {{-- <th class="text-uppercase text-xs font-weight-bolder" width="20">Password</th> --}}
                    <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($petugas as $row)
                    <tr>
                      <td class="text-xs font-weight-bolder">
                        {{ $loop->iteration }}
                      </td>
                      <td class="text-xs font-weight-bolder">
                        {{ $row->nama_petugas }}
                      </td>
                      <td class="text-xs font-weight-bolder">
                        <span class="{{ strtolower($row->level) }}-text">
                            {{ $row->level }}
                        </span>
                    </td>
                      <td class="text-xs font-weight-bolder">
                        {{ $row->username }}
                      </td>
                      {{-- <td class="text-xs font-weight-bolder">
                        {{ bcrypt($row->password) }}
                      </td> --}}
                      <td class="text-xs font-weight-bolder">
                        <form id="delete-form-{{ $row->id }}" action="{{ route('dataPetugas.destroy', $row->id) }}" method="POST">
                          <a href="{{ route('dataPetugas.edit', $row->id) }}" class="btn btn-sm mb-0 me-1 btn-warning">Edit</a>
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
