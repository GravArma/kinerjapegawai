@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Prediksi Tingkat Mutu</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Kompetensi Teknis</th>
                                <th>Kompetensi Soft Skill</th>
                                <th>Kehadiran (%)</th>
                                <th>Produktivitas</th>
                                <th>Inisiatif</th>
                                <th>Prediksi Tingkat Mutu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $row)
                                <tr>
                                    <td>{{ $row->idpegawai }}</td> <!-- Replace with actual name if available -->
                                    <td>{{ $row->kompetensi_teknis }}</td>
                                    <td>{{ $row->kompetensi_soft_skill }}</td>
                                    <td>{{ $row->kehadiran }}</td>
                                    <td>{{ $row->produktivitas }}</td>
                                    <td>{{ $row->inisiatif_kreativitas }}</td>
                                    <td>{{ $predictions[$index] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
