@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('current-user', 'Jack Anderson')
@section('page', 'Daftar User')
@section('main-page', 'Manajemen User')
@section('sub-page', 'Daftar User')

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
                          {{-- <a href="/InputDataPgw" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data</a> --}}
                      </div>
                  </div>
                </div>
                <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center" style="width:12%">NIP</th>
                    <th class="text-center" style="width:30%">Nama Pegawai</th>
                    <th class="text-center" style="width:13%">Email</th>
                    <th class="text-center" style="width:15%">Level</th>
                    <th class="text-center" style="width:14%">Action</th>
                  </tr>
                  </thead>
                  <tbody>

            <!-- Get Data to Tables -->
                  @foreach($user as $a)
                  <tr>
                    <td class="text-center">{{$a->nip}}</td>
                    <td>{{$a->nm_pegawai}}</td>
                    <td class="text-center">{{$a->email}}</td>
                    <td class="text-center">{{$a->level}}</td>
                    <td class="text-center">
                      <a href="/DaftarUser/Edit/{{ $a->nip }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                    </td>
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