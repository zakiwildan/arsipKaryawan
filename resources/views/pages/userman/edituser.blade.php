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
                        <h3 class="card-title">Input Data Pegawai</h3>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <!-- Form -->
                @foreach ($edit as $e)
                <form action="/DaftarUser/Update/{{ $e->nip }}" method="post">
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
                            <div class="col-md-6">
                                <label for="inputEmail">Email<sup style="color: red">*</sup></label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $e->email }}" >
                            </div>
                            <div class="col-md-6">
                                <label>Level User</label>
                                <select class="form-control select2bs4" name="lvl_user" style="width: 100%;">
                                    <option value="{{ $e->level }}">{{ $e->level }}</option>
                                    <option value="admin">Admin Utama</option>
                                    <option value="karyawan">Karyawan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputPassword">New Password<sup style="color: red">*</sup></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                            </div>
                            <div class="col-md-6">
                                <label for="inputRetypePassword">Retype Password<sup style="color: red">*</sup></label>
                                <input type="password" name="retypepassword" class="form-control" id="retypepassword" placeholder="Masukkan Ulang Password">
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <input type="submit" class="btn btn-primary btn-block" value="Update Data">
                            </div>
                            <div class="col-2">
                                <a href="/DaftarUser" class="btn btn-danger btn-block">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
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