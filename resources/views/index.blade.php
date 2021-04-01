@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('current-user', 'Jack Anderson')
@section('page', 'Dashboard')
@section('main-page', 'Dashboard')
@section('sub-page', 'Home')
@section('content')
<div class="container-fluid">

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-friends"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah User</span>
                <span class="info-box-number">
                  {{ $pegawai->count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Berkas</span>
                <span class="info-box-number">
                  {{ $berkas->count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-medical-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Berkas Pending</span>
                <span class="info-box-number">
                  {{ $berkasbelum->count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Berkas Verified</span>
                <span class="info-box-number">
                  {{ $berkasverif->count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>

        <!-- Info Data Belum terverifikasi -->
        @if(auth()->user()->level == "Admin")
        <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Berkas Belum Terverifikasi</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nama Berkas</th>
                    <th>Jenis</th>
                    <th>User</th>
                    <th>Tgl upload</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                @foreach ($berkasbelum as $bb)
                  <tr>
                    <td>{{ $bb->nm_berkas }}</td>
                    <td>{{ $bb->jns_berkas }}</td>
                    <td>{{ $bb->nm_pegawai }}</td>
                    <td>{{ $bb->tgl_upload }}</td>
                    <td>
                      <a href="/DaftarBerkas/{{ $bb->nip }}" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
                  
                  </tbody>
                </table>
            </div>
        </div>
        @endif

</div><!-- /.container-fluid -->
@endsection