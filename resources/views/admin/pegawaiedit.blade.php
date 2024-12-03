@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Pegawai</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit Pegawai</h4>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data"
                        action="{{ url('admin/pegawaieditsimpan/' . $pegawai->idpegawai) }}">
                        @csrf
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control" name="nip" value="{{ $pegawai->nip }}" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" value="{{ $pegawai->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="{{ $pegawai->jabatan }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $pegawai->alamat }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $pegawai->email }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="nohp" value="{{ $pegawai->nohp }}" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <button type="submit" required class="btn btn-primary float-right pull-right"
                                    name="tambah">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
