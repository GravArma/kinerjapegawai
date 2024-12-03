{{-- resources/views/admin/penilaianedit.blade.php --}}
@extends('admin/layout')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Penilaian Kinerja Pegawai</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form method="post" action="{{ url('admin/penilaianeditsimpan/' . $penilaian->id) }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="idpegawai" class="form-control selectcari" required>
                                <option value="">Pilih Pegawai</option>
                                <?php foreach ($pegawai as $row) { ?>
                                <option value="<?= $row->idpegawai ?>" <?= $row->idpegawai == $penilaian->idpegawai ? 'selected' : '' ?>>
                                    <?= $row->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Teknis</label>
                            <input type="number" class="form-control" name="kompetensi_teknis" value="{{ $penilaian->kompetensi_teknis }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Soft Skill</label>
                            <input type="number" class="form-control" name="kompetensi_soft_skill" value="{{ $penilaian->kompetensi_soft_skill }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Kehadiran</label>
                            <input type="number" class="form-control" name="kehadiran" value="{{ $penilaian->kehadiran }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Produktivitas</label>
                            <input type="number" class="form-control" name="produktivitas" value="{{ $penilaian->produktivitas }}" required min="0" max="10">
                        </div>
                        <div class="form-group">
                            <label>Inisiatif</label>
                            <input type="number" class="form-control" name="inisiatif_kreativitas" value="{{ $penilaian->inisiatif_kreativitas }}" required min="0" max="10">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
