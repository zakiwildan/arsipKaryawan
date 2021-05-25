@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('current-user', 'Jack Anderson')
@section('page', 'Arsip Pegawai')
@section('main-page', 'Arsip Pegawai')
@section('sub-page', 'Upload Berkas')
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
                                @if (auth()->user()->level == 'Karyawan')
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                        Upload Berkas
                                    </button>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Modal Upload Berkas -->
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                  <form action="/DaftarBerkas/Simpan" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Upload Berkas</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                          <!-- Isi Form Disini -->
                                      <div class="form-group">
                                        <label for="exampleInputFile">File input <span><sup style="color: red">*</sup></span></label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input name="berkas" type="file" class="custom-file-input" accept="application/pdf" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label>Jenis File <span><sup style="color: red">*</sup></span></label>
                                        <select name="jns_berkas" class="form-control">
                                          <option selected>-- Pilih Jenis Berkas --</option>
                                          @foreach ($jenisberkas as $jb)
                                              <option value="{{ $jb->kd_jns_berkas }}">{{ $jb->nm_jns_berkas }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="inputKet">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" id="inputKet" placeholder="Isi keterangan jika ada...">    
                                      </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                      <button type="submit" class="btn btn-primary">Upload File</button>
                                    </div>
                                  </div>
                                  </form>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->

                            <!-- End Modal Upload Berkas -->

                            <!-- Table Hasil Upload Berkas -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th class="text-center" style="width:28%">Nama Berkas</th>
                                    <th class="text-center" style="width:15%">Jenis Berkas</th>
                                    <th class="text-center" style="width:13%">Tgl Upload</th>
                                    <th class="text-center" style="width:15%">Keterangan</th>
                                    <th class="text-center" style="width:15%">Status</th>
                                    <th class="text-center" style="width:10%">Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                
                            <!-- Get Data to Tables -->
                                @foreach($berkas as $b)
                                  <tr>
                                    <td>{{ $b->nm_berkas }}</td>
                                    <td class="text-center">{{ $b->jns_berkas }}</td>
                                    <td class="text-center">{{ $b->tgl_upload }}</td>
                                    <td class="text-center">{{ $b->keterangan }}</td>
                                    <td class="text-center">{{ $b->stts_berkas }}</td>
                                    <td class="text-center">
                                      <a href="/DaftarBerkas/Delete/{{ $b->id_berkas }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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