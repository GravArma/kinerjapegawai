@extends('admin/layout')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Daftar penilaian</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Daftar penilaian</h4>
                    <a href="{{ url('admin/penilaiantambah/') }}" class="btn btn-success m-1">Tambah</a>

                </div>
                <div class="pb-20">
                    <div class="table-responsive">
                        <table class="table" id="daftarproduk">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Model</th>
                                    <th>Data Model (Base64)</th>
                                    <th>Tanggal Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $index => $model)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $model->model_name }}</td>
                                    <td>
                                        <textarea class="form-control" rows="2"
                                            readonly>{{ $model->model_data }}</textarea>
                                    </td>
                                    <td>{{ $model->created_at }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada model yang dilatih.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection