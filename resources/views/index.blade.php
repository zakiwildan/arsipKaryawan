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
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah User</span>
                <span class="info-box-number">
                  {{ $pegawai->count() }}
                  <small>User</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Berkas</span>
                <span class="info-box-number">
                  {{-- {{ $berkas->count() }} --}}
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Berkas Pending</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Berkas Verified</span>
                <span class="info-box-number">2,000</span>
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
                    <th>User Upload</th>
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