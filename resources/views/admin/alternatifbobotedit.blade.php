@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Ubah Nilai Bobot &raquo; <small><?= $alternatif->nama ?></small></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Ubah Nilai Bobot &raquo; <small><?= $alternatif->nama ?></small></h4>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data"
                        action="{{ url('admin/alternatifboboteditsimpan/' . $alternatif->nip) }}">
                        @csrf

                        @foreach ($rows as $row)
                            <div class="form-group">
                                <label>{{ $row->nama_kriteria }} <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" min="1" max="10"
                                    name="ID-{{ $row->ID }}" value="{{ $row->nilai }}>" />

                            </div>
                        @endforeach
                        <div class="form-group">
                            <div class="custom-file">
                                <button type="submit" required class="btn btn-primary float-right pull-right"
                                    name="simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
