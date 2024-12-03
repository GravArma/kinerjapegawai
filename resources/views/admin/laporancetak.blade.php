<html>
<title>Laporan Obat</title>
<style type="text/css">
    body {
        -webkit-print-color-adjust: exact;
        padding: 50px;
    }

    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
    }

    #table td,
    #table th {
        padding: 8px;
        padding-top: 15px;
    }

    #table tr {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    /* #table tr:nth-child(even) {
            background-color: #f2f2f2;
        } */

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 15px;
        padding-bottom: 15px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    .biru {
        background-color: #06bbcc;
        color: white;
    }

    @page {
        size: auto;
        margin: 0;
    }
</style>

<body>
    <center>
        <!-- <img src="foto/koplogo.png" width="680px"> -->
        <h2>UPTD Instalasi Farmasi Dinas Kesehatan Kota Jambi</h2>
        <h2>Laporan Obat </h2>
        <h4><?= date('d-m-Y', strtotime($tanggalawal)) . ' s/d ' . date('d-m-Y', strtotime($tanggalakhir)) ?></h4>
    </center>
    <br>
    <table class="table table-bordered table-striped" id="table" width="670px">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Obat</th>
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
</body>
<script>
    window.print();
</script>

</html>
