@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit kriteria</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Edit kriteria</h4>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data"
                        action="{{ url('admin/kriteriaeditsimpan/' . $kriteria->kode_kriteria) }}">
                        @csrf
                      
                       <div class="form-group">
                            <label>Kode <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="kode" value="{{ $kriteria->kode_kriteria }}" />
                        </div>
                        <div class="form-group">
                            <label>Nama Kriteria <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="nama" value="{{ $kriteria->nama_kriteria }}" />
                        </div>
                        <div class="form-group">
                            <label>Atribut <span class="text-danger">*</span></label>
                            <select class="form-control" name="atribut">
                                <option></option>
                                <option value='benefit' {{ $kriteria->atribut == 'benefit' ? 'selected' : '' }}>Benefit</option>
                                <option value='cost'  {{ $kriteria->atribut == 'cost' ? 'selected' : '' }}>Cost</option>
                            </select>
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
