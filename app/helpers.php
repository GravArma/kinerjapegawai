<?php
function rupiah($angka)
{
    $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilrupiah;
}
function potong($text, $panjang)
{
    $first100Chars = substr($text, 0, $panjang);
    return $first100Chars;
}
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = bulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}