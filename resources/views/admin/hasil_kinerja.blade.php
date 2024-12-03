@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Hasil Prediksi Kinerja Pegawai</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <h4 class="text-blue h4">Prediksi Kinerja Pegawai</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                <th>Nilai Rata-Rata Kinerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prediksiData as $prediksi)
                                <tr>
                                    <td>{{ $prediksi['nama'] }}</td>
                                    <td>{{ $prediksi['average_score'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
