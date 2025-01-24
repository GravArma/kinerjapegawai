@extends('admin/layout')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Dataset Kinerja Pegawai</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form method="post" action="{{ url('admin/dataseteditsimpan/' . $dataset->id) }}">
                        @csrf
                       <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" class="form-control" name="namapegawai" value="{{ $dataset->namapegawai }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Teknis</label>
                            <input type="number" class="form-control" name="kompetensi_teknis" value="{{ $dataset->kompetensi_teknis }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Soft Skill</label>
                            <input type="number" class="form-control" name="kompetensi_soft_skill" value="{{ $dataset->kompetensi_soft_skill }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Kehadiran</label>
                            <input type="number" class="form-control" name="kehadiran" value="{{ $dataset->kehadiran }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Produktivitas</label>
                            <input type="number" class="form-control" name="produktivitas" value="{{ $dataset->produktivitas }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Inisiatif</label>
                            <input type="number" class="form-control" name="inisiatif_kreativitas" value="{{ $dataset->inisiatif_kreativitas }}" required min="0" max="10">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
