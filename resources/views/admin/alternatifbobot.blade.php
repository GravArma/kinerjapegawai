@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Nilai Bobot Kriteria</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pb-20 m-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped mt-4">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Kandidat</th>
                                        <?php
                                        if ($heads > 0):
                                            for ($a = 1; $a <= $heads; $a++) {
                                                echo "<th>C$a</th>";
                                            }
                                        endif;
                                        ?>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($alternatif as $row)
                                        <tr>
                                            <td><?= $row->nip ?></td>
                                            <td><?= $row->nama ?></td>
                                            @foreach ($data[$row->nip] as $key => $val)
                                                <td><?= $val ?></td>
                                            @endforeach
                                            <td>
                                                <a class="btn btn-xs btn-warning"
                                                    href="{{ url('admin/alternatifbobotedit/' . $row->nip) }}"><span
                                                        class="glyphicon glyphicon-edit"></span> Ubah</a>
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
    @endsection
