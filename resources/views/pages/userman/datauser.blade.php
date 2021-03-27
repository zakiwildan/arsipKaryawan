@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('current-user', 'Jack Anderson')
@section('page', 'Data User')
@section('main-page', 'User Manajemen')
@section('sub-page', 'Data User')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
            <!-- DataTables -->
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="card-title">Input Data Pegawai</h3>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <!-- Form -->
                <form action="/InputDataPgw/Update/{{ auth()->user()->nip }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    @if ($errors->any())
                        <div class="form-group">
                            <div class="alert alert-danger alert-block" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><strong>{{ $error }}</strong></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>       
                    @endif
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="inputNIP">NIP Pegawai<sup style="color: red">*</sup></label>
                                <input type="text" name="nip" class="form-control" id="inputNIP" placeholder="Masukkan NIP Pegawai" value="{{ $user->nip }}">
                            </div>
                            <div class="col-6">
                                <label for="inputNama">Nama Pegawai<sup style="color: red">*</sup></label>
                                <input type="text" name="nm_pegawai" class="form-control" id="inputNama" placeholder="Masukkan Nama Pegawai" value="{{ $user->nm_pegawai }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="inputTempat">Tempat Lahir<sup style="color: red">*</sup></label>
                                <input type="text" name="tmp_lahir" class="form-control" id="inputTempat" placeholder="Masukkan Tempat Lahir" value="{{ $pegawai->tmp_lahir }}">
                            </div>
                            <div class="col-6">
                                <!-- Date -->
                                <label>Tanggal Lahir<sup style="color: red">*</sup></label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="tgl_lahir" placeholder="Input Tanggal Lahir" value="{{ $pegawai->tgl_lahir }}" class="form-control datetimepicker-input" data-target="#reservationdate"/>
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
                                <label>Jenis Kelamin<sup style="color: red">*</sup></label>
                                <select class="form-control select2bs4" name="jk" style="width: 100%;">
                                    <option value="{{ $pegawai->jk }}">{{ $pegawai->jk }}</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Agama<sup style="color: red">*</sup></label>
                                <select class="form-control select2bs4" name="agama" style="width: 100%;">
                                    <option value="{{ $pegawai->agama }}">{{ $pegawai->agama }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buhda">Budha</option>
                                    <option value="Kristen">Kristen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAlamat">Alamat<sup style="color: red">*</sup></label>
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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputNoTelp">Nomor Telepon</label>
                                <input type="text" name="no_telp" class="form-control" id="inputNoTelp" placeholder="Masukkan Nomor Telepon Pegawai" value="{{ $pegawai->no_telp }}">    
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail">Email<sup style="color: red">*</sup></label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputPassword">Password<sup style="color: red">*</sup></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                            </div>
                            <div class="col-md-6">
                                <label for="inputRetypePassword">Retype Password<sup style="color: red">*</sup></label>
                                <input type="password" name="confirm_password" class="form-control" id="retypepassword" placeholder="Masukkan Ulang Password">
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <input type="submit" class="btn btn-primary btn-block" value="Simpan Data">
                            </div>
                            <div class="col-2">
                                <a href="/Home" class="btn btn-danger btn-block">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- ./form -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- ./datatables -->
            
        </div>
        </div>
</div><!-- /.container-fluid -->
@endsection