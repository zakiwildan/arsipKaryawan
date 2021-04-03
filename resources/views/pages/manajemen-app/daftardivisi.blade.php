@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('current-user', 'Jack Anderson')
@section('page', 'Arsip Pegawai')
@section('main-page', 'Setting')
@section('sub-page', 'Manajemen App')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
            {{-- NavTabs --}}

                <div class="card card-primary card-outline card-outline-tabs">
                  <div class="card-body">
                            <!-- ISI TAB KEDUA DISINI -->
                            <div class="row">
                                <div class="col-sm-10">
                                    <!-- <h3 class="card-title">Data Pegawai</h3> -->
                                </div>
                                @if (auth()->user()->level == 'Admin')
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                      <i class="fas fa fa-plus"></i>&nbsp&nbspTambah Divisi
                                    </button>
                                </div>
                                @endif
                            </div>

                            <!-- Modal Tambah Divisi -->
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                  <form action="/DaftarDivisi/Upload" method="post">
                                  {{ csrf_field() }}
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Tambah Divisi</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <!-- Isi Form Disini -->                                    
                                      <div class="form-group">
                                        <label>Nama Divisi</label>
                                        <input type="text" name="nm_divisi" class="form-control" placeholder="Enter ...">
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                      <button type="submit" class="btn btn-primary">Tambah Divisi</button>
                                    </div>
                                  </div>
                                  </form>
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->

                            <!-- End Modal Tambah Divisi -->

                            <!-- Table Hasil Upload Berkas -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th class="text-center" style="width:10%">Kode Divisi</th>
                                    <th class="text-center" style="width:30%">Nama Divisi</th>
                                    <th class="text-center" style="width:5%">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                
                            <!-- Get Data to Tables -->
                                @foreach($divisi as $d)
                                  <tr>
                                    <td>{{ $d->kd_divisi }}</td>
                                    <td>{{ $d->nm_divisi }}</td>
                                    <td class="text-center">
                                      <form action="/DaftarDivisi/Delete/{{ $d->kd_divisi }}" method="post">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                      </form>
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
                </div>
              </div>

            {{-- /.navtabs --}}
            
        </div>
        </div>
</div><!-- /.container-fluid -->
@endsection