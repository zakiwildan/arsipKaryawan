@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('current-user', 'Jack Anderson')
@section('page', 'Arsip Pegawai')
@section('main-page', 'Arsip Pegawai')
@section('sub-page', 'Data & Arsip')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
            {{-- NavTabs --}}

                <div class="card card-primary card-outline card-outline-tabs">
                  <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Identitas Diri</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Berkas</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                        {{-- Identity Edit --}}

                                <!-- Form -->
                        <form action="/InputDataPgw/Update/{{ $pegawai->nip }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                                @if ($errors->any())
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>       
                                @endif
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="inputNIP">NIP Pegawai</label>
                                            <input type="text" name="nip" class="form-control" id="inputNIP" placeholder="Masukkan NIP Pegawai" value="{{ $pegawai->nip }}">
                                        </div>
                                        <div class="col-6">
                                            <label for="inputNama">Nama Pegawai</label>
                                            <input type="text" name="nm_pegawai" class="form-control" id="inputNama" placeholder="Masukkan Nama Pegawai" value="{{ $pegawai->nm_pegawai }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="inputTempat">Tempat Lahir</label>
                                            <input type="text" name="tmp_lahir" class="form-control" id="inputTempat" placeholder="Masukkan Tempat Lahir" value="{{ $pegawai->tmp_lahir }}">
                                        </div>
                                        <div class="col-6">
                                            <!-- Date -->
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="tgl_lahir" placeholder="Input Tanggal Lahir" class="form-control datetimepicker-input" value="{{ $pegawai->tgl_lahir }}" data-target="#reservationdate"/>
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            <!-- /.date -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control select2bs4" name="jk" style="width: 100%;">
                                                <option value="{{ $pegawai->jk }}" selected="selected">{{ $pegawai->jk }}</option>
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Agama</label>
                                            <select class="form-control select2bs4" name="agama" style="width: 100%;">
                                                <option selected="selected" value="{{ $pegawai->agama }}">{{ $pegawai->agama }}</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buhda">Budha</option>
                                                <option value="Kristen">Kristen</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAlamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Masukkan Alamat Pegawai" value="{{ $pegawai->alamat }}">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Divisi</label>
                                            <select class="form-control select2bs4" name="divisi" style="width: 100%;">
                                                <option value="{{ $pegawai->divisi }}">{{ $pegawai->divisi }}</option>
                                                <option value="Rawat Jalan">Rawat Jalan</option>
                                                <option value="IBS">IBS</option>
                                                <option value="TPPRI/TPPRJ">TPPRI/TPPRJ</option>
                                                <option value="Laboratorium">Laboratorium</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jabatan</label>
                                            <select class="form-control select2bs4" name="jabatan" style="width: 100%;">
                                                <option value="{{ $pegawai->jabatan }}">{{ $pegawai->jabatan }}</option>
                                                <option value="Kepala Ruangan">Kepala Ruangan</option>
                                                <option value="Pelaksana">Pelaksana</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputNoTelp">Nomor Telepon</label>
                                    <input type="text" name="no_telp" class="form-control" id="inputNoTelp" placeholder="Masukkan Nomor Telepon Pegawai" value="{{ $pegawai->no_telp }}">
                                </div>

                                <input type="submit" class="btn btn-primary btn-block" value="Update Data">
                        </form>
                        <!-- ./form -->

                        {{-- /.identity edit --}}


                      </div>
                      <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                            <!-- ISI TAB KEDUA DISINI -->

                            <!-- Table Hasil Upload Berkas -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th class="text-center" style="width:12%">Nama Berkas</th>
                                    <th class="text-center" style="width:30%">Jenis Berkas</th>
                                    <th class="text-center" style="width:13%">Tgl Upload</th>
                                    <th class="text-center" style="width:15%">Keterangan</th>
                                    <th class="text-center" style="width:10%">Status Verifikasi</th>
                                    <th class="text-center" style="width:15%">Verifikasi</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                
                            <!-- Get Data to Tables -->
                                  <tr>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                  </tr>

                            <!-- ./end get data to tables -->
                
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->

                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>

            {{-- /.navtabs --}}
            
        </div>
        </div>
</div><!-- /.container-fluid -->
@endsection