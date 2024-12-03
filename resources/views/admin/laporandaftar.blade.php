@extends('admin/layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Laporan Obat</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Laporan Obat</h4>
                        <form method="get" action="{{ url('admin/laporandaftar') }}">
                            @csrf
                            <div class="row mt-3 mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Awal</label>
                                        <input type="date" class="form-control" name="tanggalawal"
                                            value="{{ $tanggalawal }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Akhir</label>
                                        <input type="date" class="form-control" name="tanggalakhir"
                                            value="{{ $tanggalakhir }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" name="submit" value="submit"
                                            class="btn btn-primary text-white btn-block"
                                            style="margin-top:35px">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form method="post" action="{{ url('admin/laporancetak') }}" target="_blank">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="tanggalawalfix" value="{{ $tanggalawal }}"
                                    required>
                                <input type="hidden" class="form-control" name="tanggalakhirfix"
                                    value="{{ $tanggalakhir }}" required>
                                <button type="submit" class="btn btn-success text-white">Cetak</button>
                            </div>
                        </form>
                    </div>
                    <div class="pb-20">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th width="30%" class="text-center">Nama Obat</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Harga Jual</th>
                                        <th class="text-center">Tanggal Kadaluarsa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataobat as $obat)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $obat->namaobat }}</td>
                                            <td class="text-center">{{ $obat->stok }}</td>
                                            <td class="text-center">{{ rupiah($obat->hargajual) }}</td>
                                            <td class="text-center">{{ tanggal($obat->tanggalkadaluarsa) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
