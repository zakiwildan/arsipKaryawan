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

                <!-- DataTables -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-10">
                                <h3 class="card-title">Tambah Data Pegawai</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <!-- Form -->
                        <form action="/InputDataPgw/Simpan" method="post" onsubmit="return validateForm()" name="formTambahData">
                            {{ csrf_field() }}
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
                                        <input type="text" name="nip" class="form-control" id="inputNIP"
                                            placeholder="Masukkan NIP Pegawai">
                                    </div>
                                    <div class="col-6">
                                        <label for="inputNama">Nama Pegawai<sup style="color: red">*</sup></label>
                                        <input type="text" name="nm_pegawai" class="form-control" id="inputNama"
                                            placeholder="Masukkan Nama Pegawai">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="inputTempat">Tempat Lahir<sup style="color: red">*</sup></label>
                                        <input type="text" name="tmp_lahir" class="form-control" id="inputTempat"
                                            placeholder="Masukkan Tempat Lahir">
                                    </div>
                                    <div class="col-6">
                                        <!-- Date -->
                                        <label>Tanggal Lahir<sup style="color: red">*</sup></label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="tgl_lahir" placeholder="Input Tanggal Lahir"
                                                class="form-control datetimepicker-input" data-target="#reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
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
                                            <option value="" selected="selected">-- Silahkan Pilih Jenis Kelamin --</option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Agama<sup style="color: red">*</sup></label>
                                        <select class="form-control select2bs4" name="agama" style="width: 100%;">
                                            <option value="">-- Silahkan Pilih Agama --</option>
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
                                <input type="text" name="alamat" class="form-control" id="inputAlamat"
                                    placeholder="Masukkan Alamat Pegawai">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Divisi</label>
                                        <select class="form-control select2bs4" name="divisi" style="width: 100%;">
                                            <option value="">-- Silahkan Pilih Divisi --</option>
                                            @foreach ($divisi as $d)
                                                <option value="{{ $d->kd_divisi }}">{{ $d->nm_divisi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                        <select class="form-control select2bs4" name="jabatan" style="width: 100%;">
                                            <option value="">-- Silahkan Pilih Jabatan --</option>
                                            @foreach ($jabatan as $j)
                                                <option value="{{ $j->kd_jabatan }}">{{ $j->nm_jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputNoTelp">Nomor Telepon</label>
                                        <input type="text" name="no_telp" class="form-control" id="inputNoTelp"
                                            placeholder="Masukkan Nomor Telepon Pegawai">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail">Email<sup style="color: red">*</sup></label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Masukkan Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputPassword">Password<sup style="color: red">*</sup></label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Masukkan Password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputRetypePassword">Retype Password<sup
                                                style="color: red">*</sup></label>
                                        <input type="password" name="retypepassword" class="form-control"
                                            id="retypepassword" placeholder="Masukkan Ulang Password">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                    <div class="col-2">
                                        <a href="/DataPegawai" class="btn btn-danger btn-block">Kembali</a>
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

    <script>
        function validateForm() {
            if (document.forms["formTambahData"]["nip"].value == "") {
                document.forms["formTambahData"]["nip"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: "Kolom <b>NIP</b> Masih Kosong!!",
                  icon: 'warning',
                  showConfirmButton: true,
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["nm_pegawai"].value == "") {
                document.forms["formTambahData"]["nm_pegawai"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Nama Pegawai</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["tmp_lahir"].value == "") {
                document.forms["formTambahData"]["tmp_lahir"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Tempat Lahir</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["tgl_lahir"].value == "") {
                document.forms["formTambahData"]["tgl_lahir"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Tanggal Lahir</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["jk"].value == "") {
                document.forms["formTambahData"]["jk"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Jenis Kelamin</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["agama"].value == "") {
                document.forms["formTambahData"]["agama"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Agama</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["alamat"].value == "") {
                document.forms["formTambahData"]["alamat"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Alamat</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["divisi"].value == "") {
                document.forms["formTambahData"]["divisi"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Divisi</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["jabatan"].value == "") {
                document.forms["formTambahData"]["jabatan"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Jabatan</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["no_telp"].value == "") {
                document.forms["formTambahData"]["no_telp"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Nomor Telepon</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["email"].value == "") {
                document.forms["formTambahData"]["email"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom </b>Email</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
            else if (document.forms["formTambahData"]["password"].value == "") {
                document.forms["formTambahData"]["password"].focus();
                Swal.fire({
                  title: "Error!",
                  confirmButtonText: "Kembali",
                  html: 'Kolom <b>Password</b> Masih Kosong!!!',
                  icon: 'warning',
                  timer: 3000
                })
                return false;
            }
        }
      </script>

@endsection
