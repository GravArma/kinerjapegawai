<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Phpml\Classification\RandomForest;
use Phpml\Preprocessing\LabelEncoder;

class AdminController extends Controller
{
    public function dashboard()
    {


        $data = [
            'title' => 'Selamat Datang',

        ];
        return view('admin/dashboard', $data);
    }

    public function logout()
    {
        session()->flush();
        return redirect('/loginakun');
    }

    public function pegawaidaftar()
    {
        $pegawai = DB::table('pegawai')->get();
        $data = [
            'title' => 'Daftar pegawai',
            'pegawai' => $pegawai,
        ];
        return view('admin.pegawaidaftar', $data);
    }
    public function pegawaitambah()
    {
        $data = [
            'title' => 'Tambah pegawai',
        ];
        return view('admin.pegawaitambah', $data);
    }
    public function pegawaitambahsimpan(Request $request)
    {
        // Mengambil input dari form
        $nip = $request->input('nip');
        $nama = $request->input('nama');
        $jabatan = $request->input('jabatan');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $nohp = $request->input('nohp');

        // Mengecek apakah NIP sudah ada di database
        $existingNip = DB::table('pegawai')->where('nip', $nip)->first();

        if ($existingNip) {
            // Jika NIP sudah ada, tampilkan pesan kesalahan
            session()->flash('error', 'NIP sudah terdaftar!');
            return redirect()->back()->withInput();
        }

        // Menyimpan data ke dalam array untuk di-insert ke database
        $simpan = [
            'nip' => $nip,
            'nama' => $nama,
            'jabatan' => $jabatan,
            'alamat' => $alamat,
            'email' => $email,
            'nohp' => $nohp,
        ];

        // Menyimpan data ke tabel 'pegawai'
        DB::table('pegawai')->insert($simpan);

        // Menampilkan pesan sukses dan mengarahkan kembali ke halaman daftar pegawai
        session()->flash('success', 'Berhasil menambahkan data pegawai!');
        return redirect('admin/pegawaidaftar');
    }


    public function pegawaiedit($id)
    {
        $pegawai = DB::table('pegawai')->where('idpegawai', $id)->first();
        $data = [
            'title' => 'Edit pegawai',
            'pegawai' => $pegawai,
        ];
        return view('admin.pegawaiedit', $data);
    }

    public function pegawaieditsimpan(Request $request, $id)
    {
        $nip = $request->input('nip');
        $nama = $request->input('nama');
        $jabatan = $request->input('jabatan');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $nohp = $request->input('nohp');

        $simpan = [
            'nip' => $nip,
            'nama' => $nama,
            'jabatan' => $jabatan,
            'alamat' => $alamat,
            'email' => $email,
            'nohp' => $nohp,
        ];


        DB::table('pegawai')->where('idpegawai', $id)->update($simpan);

        session()->flash('success', 'Berhasil mengubah data!');
        return redirect('admin/pegawaidaftar');
    }

    public function pegawaihapus($id)
    {

        DB::table('pegawai')->where('idpegawai', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('admin/pegawaidaftar');
    }

    public function kriteriadaftar()
    {
        $kriteria = DB::table('kriteria')->get();
        $data = [
            'title' => 'Daftar kriteria',
            'kriteria' => $kriteria,
        ];
        return view('admin.kriteriadaftar', $data);
    }


    public function kriteriatambah()
    {
        $data = [
            'title' => 'Tambah kriteria',
        ];
        return view('admin.kriteriatambah', $data);
    }
    public function kriteriatambahsimpan(Request $request)
    {
        // Mengambil input dari form
        $kode = $request->input('kode');
        $nama = $request->input('nama');
        $atribut = $request->input('atribut');

        // Memeriksa apakah kode kriteria sudah ada untuk periode yang sama
        $exists = DB::table('kriteria')
            ->where('kode_kriteria', $kode)
            ->exists();

        if ($exists) {
            // Menampilkan pesan kesalahan jika kode kriteria sudah ada
            session()->flash('error', 'Kode kriteria sudah ada untuk periode ini!');
            return redirect('admin/kriteriadaftar');
        } else {
            $simpan = [
                'kode_kriteria' => $kode,
                'nama_kriteria' => $nama,
                'atribut' => $atribut,
            ];

            // Menyimpan data ke tabel 'kriteria'
            DB::table('kriteria')->insert($simpan);

            // Menambahkan relasi kriteria
            DB::table('rel_kriteria')->insertUsing(
                ['ID1', 'ID2', 'nilai'],
                DB::table('kriteria')
                    ->selectRaw("'$kode', kode_kriteria, 1")
            );

            DB::table('rel_kriteria')->insertUsing(
                ['ID1', 'ID2', 'nilai'],
                DB::table('kriteria')
                    ->selectRaw("kode_kriteria, '$kode', 1")
                    ->where('kode_kriteria', '<>', $kode)
            );

            // Menambahkan relasi alternatif
            DB::table('rel_alternatif')->insertUsing(
                ['kode_alternatif', 'kode_kriteria', 'nilai'],
                DB::table('pegawai')
                    ->selectRaw("nip, '$kode', 0")
            );

            // Menampilkan pesan sukses dan mengarahkan kembali ke halaman daftar kriteria
            session()->flash('success', 'Berhasil menambahkan data kriteria!');
            return redirect('admin/kriteriadaftar');
        }
    }


    public function kriteriaedit($kode_kriteria)
    {
        $kriteria = DB::table('kriteria')->where('kode_kriteria', $kode_kriteria)->first();
        $data = [
            'title' => 'Edit kriteria',
            'kriteria' => $kriteria,
        ];
        return view('admin.kriteriaedit', $data);
    }

    public function kriteriaeditsimpan(Request $request, $kode_kriteria)
    {
        $kode = $request->input('kode');
        $nama = $request->input('nama');
        $atribut = $request->input('atribut');


        $simpan = [
            'kode_kriteria' => $kode,
            'nama_kriteria' => $nama,
            'atribut' => $atribut,
        ];


        DB::table('kriteria')->where('kode_kriteria', $kode_kriteria)->update($simpan);

        session()->flash('success', 'Berhasil mengubah data!');
        return redirect('admin/kriteriadaftar');
    }

    public function kriteriahapus($kode_kriteria)
    {
        DB::table('kriteria')->where('kode_kriteria', $kode_kriteria)->delete();

        DB::table('rel_kriteria')
            ->where('ID1', $kode_kriteria)
            ->orWhere('ID2', $kode_kriteria)
            ->delete();

        DB::table('rel_alternatif')->where('kode_kriteria', $kode_kriteria)->delete();

        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('admin/kriteriadaftar');
    }

    public function kriteriabobot(Request $request)
    {
        $kriteria = DB::table('kriteria')->get();
        $nilaiOptions = [
            '1' => 'Sama penting dengan',
            '2' => 'Mendekati sedikit lebih penting dari',
            '3' => 'Sedikit lebih penting dari',
            '4' => 'Mendekati lebih penting dari',
            '5' => 'Lebih penting dari',
            '6' => 'Mendekati sangat penting dari',
            '7' => 'Sangat penting dari',
            '8' => 'Mendekati mutlak dari',
            '9' => 'Mutlak sangat penting dari',
        ];

        $rows = DB::table('rel_kriteria as rk')
            ->join('kriteria as k', 'k.kode_kriteria', '=', 'rk.ID1')
            ->select('k.nama_kriteria', 'rk.ID1', 'rk.ID2', 'rk.nilai')
            ->orderBy('rk.ID1')
            ->orderBy('rk.ID2')
            ->get();

        $criterias = [];
        $data = [];

        foreach ($rows as $row) {
            $criterias[$row->ID1] = $row->nama_kriteria;
            $data[$row->ID1][$row->ID2] = $row->nilai;
        }

        $data = [
            'title' => 'Nilai Bobot Kriteria',
            'kriteria' => $kriteria,
            'nilaiOptions' => $nilaiOptions,
            'criterias' => $criterias,
            'data' => $data,
        ];

        return view('admin.kriteriabobot', $data);
    }

    public function updateKriteriaNilai(Request $request)
    {
        $ID1 = $request->input('ID1');
        $ID2 = $request->input('ID2');
        $nilai = abs($request->input('nilai'));

        if ($ID1 == $ID2 && $nilai != 1) {
            session()->flash('error', 'Kriteria yang sama harus bernilai 1.');
            return redirect()->back();
        } else {
            DB::table('rel_kriteria')
                ->where('ID1', $ID1)
                ->where('ID2', $ID2)
                ->update(['nilai' => $nilai]);

            DB::table('rel_kriteria')
                ->where('ID1', $ID2)
                ->where('ID2', $ID1)
                ->update(['nilai' => 1 / $nilai]);

            session()->flash('success', 'Nilai kriteria berhasil diubah.');
            return redirect()->back();
        }
    }


    public function alternatifbobot(Request $request)
    {
        $heads = DB::table('kriteria')->count();

        $alternatif = DB::table('pegawai')->orderBy('nip', 'ASC')->get();

        $rows = DB::table('pegawai as a')
            ->join('rel_alternatif as ra', 'a.nip', '=', 'ra.kode_alternatif')
            ->join('kriteria as k', 'k.kode_kriteria', '=', 'ra.kode_kriteria')
            ->select('a.nip', 'k.kode_kriteria', 'ra.nilai')
            ->orderBy('a.nip')
            ->orderBy('k.kode_kriteria')
            ->get();

        $data = [];
        foreach ($rows as $row) {
            $data[$row->nip][$row->kode_kriteria] = $row->nilai;
        }

        $data = [
            'title' => 'Nilai Bobot Alternatif',
            'heads' => $heads,
            'data' => $data,
            'alternatif' => $alternatif,
        ];

        return view('admin.alternatifbobot', $data);
    }

    public function alternatifbobotedit($id)
    {

        $alternatif = DB::table('pegawai')->where('nip', $id)->first();

        $rows = DB::table('rel_alternatif as ra')
            ->join('kriteria as k', 'k.kode_kriteria', '=', 'ra.kode_kriteria')
            ->select('ra.ID', 'k.kode_kriteria', 'k.nama_kriteria', 'ra.nilai')
            ->where('kode_alternatif', $id)
            ->orderBy('k.kode_kriteria')
            ->get();


        $data = [
            'title' => 'Edit Nilai Bobot Alternatif',
            'rows' => $rows,
            'alternatif' => $alternatif,
        ];

        return view('admin.alternatifbobotedit', $data);
    }

    public function alternatifboboteditsimpan(Request $request, $id)
    {
        // Mendapatkan semua input dari form
        $inputs = $request->except('_token'); // Mengabaikan token CSRF

        // Iterasi melalui input yang diterima
        foreach ($inputs as $key => $value) {
            // Menghapus prefix 'ID-' untuk mendapatkan ID asli
            $ID = str_replace('ID-', '', $key);

            // Memperbarui nilai bobot dalam tabel 'rel_alternatif'
            DB::table('rel_alternatif')
                ->where('ID', $ID)
                ->update(['nilai' => $value]);
        }

        // Menampilkan pesan sukses
        session()->flash('success', 'Nilai bobot alternatif berhasil diubah.');

        // Mengarahkan kembali ke halaman daftar alternatif
        return redirect('admin/alternatifbobot');
    }


    public function perhitungan()
    {

        $nRI = array(
            1 => 0,
            2 => 0,
            3 => 0.58,
            4 => 0.9,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.46,
            10 => 1.49,
            11 => 1.51,
            12 => 1.48,
            13 => 1.56,
            14 => 1.57,
            15 => 1.59
        );

        $matriks = $this->AHP_get_relkriteria();
        $total = $this->AHP_get_total_kolom($matriks);
        $normal = $this->AHP_normalize($matriks, $total);
        $rata = $this->AHP_get_rata($normal);
        $cm = $this->AHP_consistency_measure($matriks, $rata);

        $data = [
            'title' => 'Perhitungan',
            'matriks' => $matriks,
            'total' => $total,
            'normal' => $normal,
            'rata' => $rata,
            'cm' => $cm,
            'nRI' => $nRI,
        ];
        return view('admin.perhitungan', $data);
    }



    public function AHP_get_relkriteria()
    {
        $rows = DB::table('rel_kriteria as rk')
            ->join('kriteria as k', 'k.kode_kriteria', '=', 'rk.ID1')
            ->select('k.nama_kriteria', 'rk.ID1', 'rk.ID2', 'rk.nilai')
            ->orderBy('ID1')
            ->orderBy('ID2')
            ->get();

        $data = [];
        foreach ($rows as $row) {
            $data[$row->ID1][$row->ID2] = $row->nilai;
        }
        return $data;
    }

    public function AHP_get_total_kolom($matriks)
    {
        $total = [];
        foreach ($matriks as $key => $value) {
            foreach ($value as $k => $v) {
                $total[$k] = isset($total[$k]) ? ($total[$k] + $v) : $v;
            }
        }
        return $total;
    }

    public function AHP_normalize($matriks, $total)
    {
        foreach ($matriks as $key => $value) {
            foreach ($value as $k => $v) {
                $matriks[$key][$k] = $matriks[$key][$k] / $total[$k];
            }
        }
        return $matriks;
    }

    public function AHP_get_rata($normal)
    {
        $rata = [];
        foreach ($normal as $key => $value) {
            $rata[$key] = array_sum($value) / count($value);
        }
        return $rata;
    }
    public function AHP_consistency_measure($matriks, $rata)
    {
        $cm = [];
        $matriks = $this->AHP_mmult($matriks, $rata);
        foreach ($matriks as $key => $value) {
            $cm[$key] = $value / $rata[$key];
        }
        return $cm;
    }

    public function AHP_mmult($matriks = array(), $rata = array())
    {
        $data = array();

        $rata = array_values($rata);

        foreach ($matriks as $key => $value) {
            $no = 0;
            foreach ($value as $k => $v) {
                $data[$key] = isset($data[$key]) ? ($data[$key] + ($v * $rata[$no])) : $v * $rata[$no];
                $no++;
            }
        }

        return $data;
    }

}
