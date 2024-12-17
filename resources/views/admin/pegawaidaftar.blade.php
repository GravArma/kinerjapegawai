@extends('admin/layout')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Daftar Pegawai</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="pd-20">
                    <h4 class="text-blue h4">Daftar Pegawai</h4>
                    <a href="{{ url('admin/pegawaitambah/') }}" class="btn btn-success m-1">Tambah</a>

                </div>
                <div class="pb-20">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                @foreach ($pegawai as $row)
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $row->nip }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->jabatan }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->nohp }}</td>
                                    <td>
                                        <a href="{{ url('admin/predictKinerja/' . $row->idpegawai) }}"
                                            class="btn btn-info m-1">Prediksi Kinerja</a>
                                        <a href="{{ url('admin/pegawaiedit/' . $row->idpegawai) }}"
                                            class="btn btn-success m-1">Edit</a>
                                        <a href="{{ url('admin/pegawaihapus/' . $row->idpegawai) }}"
                                            class="btn btn-danger m-1"
                                            onclick="return confirm('Yakin Mau di Hapus?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection