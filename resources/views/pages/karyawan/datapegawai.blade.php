@extends('layouts.main')

@section('app-name', 'SIAP ~ 2K20')
@section('page', 'Data Pegawai')
@section('main-page', 'Data Pegawai')
@section('sub-page', 'Data Pegawai')

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
                                <a href="/TambahData" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah
                                    Data</a>
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
                                    <th class="text-center" style="width:13%">Tgl Lahir</th>
                                    <th class="text-center" style="width:15%">Divisi</th>
                                    <th class="text-center" style="width:15%">Jabatan</th>
                                    <th class="text-center" style="width:14%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Get Data to Tables -->
                                @foreach ($pegawai as $p)
                                    <tr>
                                        <td class="text-center">{{ $p->nip }}</td>
                                        <td>{{ $p->nm_pegawai }}</td>
                                        <td class="text-center">{{ $p->tgl_lahir }}</td>
                                        <td class="text-center">{{ $p->nm_divisi }}</td>
                                        <td class="text-center">{{ $p->nm_jabatan }}</td>
                                        <td class="text-center">
                                            <a href="/InputDataPgw/Edit/{{ $p->nip }}" title="Edit Data" class="btn btn-primary"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a href="/InputDataPgw/Delete/{{ $p->nip }}" id="rmv" title="Hapus Data" class="btn btn-danger"><i
                                                    class="fas fa-trash-alt"></i></a>
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

<script>
    
</script>
@endsection
