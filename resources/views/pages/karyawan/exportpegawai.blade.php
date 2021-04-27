@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('current-user', 'Jack Anderson')
@section('page', 'Export Data & Arsip')
@section('main-page', 'Arsip Pegawai')
@section('sub-page', 'Export Data & Arsip')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
                    
        <!-- DataTables -->
        <div class="card">

            <div class="card-header">
              <div class="row">
                  <div class="col-sm-10">
                      <h3></h3>
                  </div>
                  <div class="col-sm-2">
                      <a href="/ExportData/Export" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Export Data XLS</a>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->

          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th class="text-center" style="width:10%">NIP</th>
                <th class="text-center" style="width:28%">Nama Pegawai</th>
                <th class="text-center" style="width:13%">Tgl Lahir</th>
                <th class="text-center" style="width:18%">Divisi</th>
                <th class="text-center" style="width:15%">Jabatan</th>
              </tr>
              </thead>
              <tbody>

        <!-- Get Data to Tables -->
              @foreach($pegawai as $p)
              <tr>
                <td class="text-center">{{$p->nip}}</td>
                <td>{{$p->nm_pegawai}}</td>
                <td class="text-center">{{$p->tgl_lahir}}</td>
                <td class="text-center">{{$p->nm_divisi}}</td>
                <td class="text-center">{{$p->nm_jabatan}}</td>
              </tr>
              
              @endforeach
        <!-- ./end get data to tables -->

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- ./datatables -->
        
    </div>
    </div>
</div><!-- /.container-fluid -->
@endsection