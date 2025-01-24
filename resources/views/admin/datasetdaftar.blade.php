@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Daftar dataset</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Daftar dataset</h4>
                        <a href="{{ url('admin/datasettambah/') }}" class="btn btn-success m-1">Tambah</a>

                    </div>
                    <div class="pb-20">
                        <div class="table-responsive">
                            <table class="table" id="daftarproduk">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Kompetensi Teknis</th>
                                        <th>Kompetensi Soft Skill</th>
                                        <th>Kehadiran</th>
                                        <th>Produktivitas</th>
                                        <th>Inisiatif Kreativitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>

                                    @foreach ($dataset as $item)
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $item->namapegawai }}</td>
                                            <td>{{ $item->kompetensi_teknis }}</td>
                                            <td>{{ $item->kompetensi_soft_skill }}</td>
                                            <td>{{ $item->kehadiran }}</td>
                                            <td>{{ $item->produktivitas }}</td>
                                            <td>{{ $item->inisiatif_kreativitas }}</td>
                                            <td> 
                                                <a href="{{ url('admin/datasetedit/' . $item->id) }}"
                                                    class="btn btn-success m-1">Edit</a>
                                                <a href="{{ url('admin/datasethapus/' . $item->id) }}"
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
