@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Daftar kriteria</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Daftar kriteria</h4>
                        <a href="{{ url('admin/kriteriatambah/') }}" class="btn btn-success m-1">Tambah</a>

                    </div>
                    <div class="pb-20">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Kriteria</th>
                                        <th>Atribut</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($kriteria as $row)
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td><?= $row->kode_kriteria ?></td>
                                            <td><?= $row->nama_kriteria ?></td>
                                            <td><?= $row->atribut ?></td>
                                            <td>
                                                <a href="{{ url('admin/kriteriaedit/' . $row->kode_kriteria) }}"
                                                    class="btn btn-success m-1">Edit</a>
                                                <a href="{{ url('admin/kriteriahapus/' . $row->kode_kriteria) }}"
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
