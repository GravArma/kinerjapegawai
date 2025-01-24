@extends('admin.layout')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Perhitungan</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30">

                    <div class="pb-20">
                        <div class="card shadow">
                            <div class="card-header bg-primary text-white">
                                <strong>Mengukur Konsistensi Kriteria (AHP)</strong>
                            </div>
                            <div class="card-body">
                                <!-- Matriks Perbandingan Kriteria -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            Matriks Perbandingan Kriteria
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p>Pertama-tama menyusun hirarki dimana diawali dengan tujuan, kriteria dan
                                            alternatif-alternatif lokasi pada tingkat paling bawah.
                                            Selanjutnya menetapkan perbandingan berpasangan antara kriteria-kriteria dalam
                                            bentuk matrik.
                                            Nilai diagonal matrik untuk perbandingan suatu elemen dengan elemen itu sendiri
                                            diisi dengan bilangan (1) sedangkan isi nilai perbandingan antara (1) sampai
                                            dengan (9) kebalikannya, kemudian dijumlahkan perkolom.
                                            Data matrik tersebut seperti terlihat pada tabel berikut.</p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <?php
                                                // $matriks = AHP_get_relkriteria();
                                                // $total = AHP_get_total_kolom($matriks);
                                                
                                                echo '<thead><tr><th></th>';
                                                foreach ($matriks as $key => $value) {
                                                    echo "<th class='nw'>$key</th>";
                                                }
                                                echo '<tr></thead>';
                                                foreach ($matriks as $key => $value) {
                                                    echo "<tr><th class='nw'>$key</th>";
                                                    foreach ($value as $k => $v) {
                                                        echo '<td>' . round($v, 3) . '</td>';
                                                    }
                                                    echo '</tr>';
                                                }
                                                echo "<tfoot><tr><th class='nw'>Total</th>";
                                                foreach ($total as $key => $value) {
                                                    echo "<td class='text-primary'>" . round($total[$key], 3) . '</td>';
                                                }
                                                echo '</tr></tfoot>';
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Matriks Bobot Prioritas Kriteria -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            Matriks Bobot Prioritas Kriteria
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p>Setelah terbentuk matrik perbandingan maka dilihat bobot prioritas untuk
                                            perbandingan kriteria.
                                            Dengan cara membagi isi matriks perbandingan dengan jumlah kolom yang
                                            bersesuaian, kemudian menjumlahkan perbaris setelah itu hasil penjumlahan dibagi
                                            dengan banyaknya kriteria sehingga ditemukan bobot prioritas seperti terlihat
                                            pada berikut.</p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <?php
                                                // $normal = AHP_normalize($matriks, $total);
                                                // $rata = AHP_get_rata($normal);
                                                
                                                echo '<thead><tr><th></th>';
                                                $no = 1;
                                                foreach ($normal as $key => $value) {
                                                    echo "<th class='nw'>$key</th>";
                                                    $no++;
                                                }
                                                echo "<th class='nw'>Bobot Prioritas</th></tr></thead>";
                                                $no = 1;
                                                foreach ($normal as $key => $value) {
                                                    echo '<tr>';
                                                    echo "<th class='nw'>$key</th>";
                                                    foreach ($value as $k => $v) {
                                                        echo '<td>' . round($v, 3) . '</td>';
                                                    }
                                                    echo "<td class='text-primary'>" . round($rata[$key], 3) . '</td>';
                                                    echo '</tr>';
                                                    $no++;
                                                }
                                                echo '</tr>';
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Matriks Konsistensi Kriteria -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            Matriks Konsistensi Kriteria
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p>Untuk mengetahui konsisten matriks perbandingan dilakukan perkalian seluruh isi
                                            kolom matriks A perbandingan dengan bobot prioritas kriteria A, isi kolom B
                                            matriks perbandingan dengan bobot prioritas kriteria B dan seterusnya. Kemudian
                                            dijumlahkan setiap barisnya dan dibagi penjumlahan baris dengan bobot prioritas
                                            bersesuaian seperti terlihat pada tabel berikut.</p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <?php
                                                // $cm = AHP_consistency_measure($matriks, $rata);
                                                
                                                echo '<thead><tr><th></th>';
                                                $no = 1;
                                                foreach ($normal as $key => $value) {
                                                    echo "<th class='nw'>$key</th>";
                                                    $no++;
                                                }
                                                echo '<th>Bobot</th></tr></thead>';
                                                $no = 1;
                                                foreach ($normal as $key => $value) {
                                                    echo '<tr>';
                                                    echo "<th class='nw'>$key</th>";
                                                    foreach ($value as $k => $v) {
                                                        echo '<td>' . round($v, 3) . '</td>';
                                                    }
                                                    echo "<td class='text-primary'>" . round($cm[$key], 3) . '</td>';
                                                    echo '</tr>';
                                                    $no++;
                                                }
                                                echo '</tr>';
                                                ?>
                                            </table>
                                        </div>
                                        <p>Berikut tabel ratio index berdasarkan ordo matriks.</p>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Ordo matriks</th>
                                                <?php
                                                foreach ($nRI as $key => $value) {
                                                    if (count($matriks) == $key) {
                                                        echo "<td class='text-primary'>$key</td>";
                                                    } else {
                                                        echo "<td>$key</td>";
                                                    }
                                                }
                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Ratio index</th>
                                                <?php
                                                foreach ($nRI as $key => $value) {
                                                    if (count($matriks) == $key) {
                                                        echo "<td class='text-primary'>$value</td>";
                                                    } else {
                                                        echo "<td>$value</td>";
                                                    }
                                                }
                                                ?>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?php
                                    $CI = (array_sum($cm) / count($cm) - count($cm)) / (count($cm) - 1);
                                    $RI = $nRI[count($matriks)];
                                    $CR = $CI / $RI;
                                    echo '<p>Consistency Index: ' . round($CI, 3) . '<br />';
                                    echo 'Ratio Index: ' . round($RI, 3) . '<br />';
                                    echo 'Consistency Ratio: ' . round($CR, 3);
                                    if ($CR > 0.1) {
                                        echo ' (Tidak konsisten)<br />';
                                    } else {
                                        echo ' (Konsisten)<br />';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
