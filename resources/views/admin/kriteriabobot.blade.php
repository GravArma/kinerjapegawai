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
                    <div class="pd-20">
                        <h4 class="text-blue h4">Nilai Bobot kriteria</h4>
                        <form class="form-inline" action="{{ url('admin/updateKriteriaNilai') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <select class="form-control" name="ID1">
                                    @foreach ($kriteria as $k)
                                        <option value="{{ $k->kode_kriteria }}">{{ $k->nama_kriteria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="nilai">
                                    @foreach ($nilaiOptions as $key => $value)
                                        <option value="{{ $key }}">{{ $key }} - {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="ID2">
                                    @foreach ($kriteria as $k)
                                        <option value="{{ $k->kode_kriteria }}">{{ $k->nama_kriteria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Ubah</button>
                            </div>
                        </form>
                    </div>

                    <div class="pb-20 mx-3">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <?php
                                        foreach ($data as $key => $value) {
                                            echo "<th>$key</th>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $a = 1;
                                    foreach ($data as $key => $value) : ?>
                                    <tr>
                                        <th class="text-nowrap"><?= $key ?></th>
                                        <?php
                                        $b = 1;
                                        foreach ($value as $k => $dt) {
                                            if ($key == $k) {
                                                $class = 'bg-success';
                                            } elseif ($b > $a) {
                                                $class = 'bg-danger';
                                            } else {
                                                $class = '';
                                            }
                                        
                                            echo "<td class='$class'>" . round($dt, 3) . '</td>';
                                            $b++;
                                        }
                                        $no++;
                                        ?>
                                    </tr>
                                    <?php $a++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
