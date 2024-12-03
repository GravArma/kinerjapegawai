<?php

namespace App\Http\Controllers;

use App\RandomForest;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;

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

    public function penilaiandaftar()
    {
        $penilaian = DB::table('penilaian_kinerja')
            ->join('pegawai', 'penilaian_kinerja.idpegawai', '=', 'pegawai.idpegawai')
            ->get();

        $data = [
            'title' => 'Daftar Penilaian Kinerja',
            'penilaian' => $penilaian,
        ];

        return view('admin.penilaiandaftar', $data);
    }
    public function penilaiantambah()
    {
        $pegawai = DB::table('pegawai')->get();

        $data = [
            'title' => 'Tambah Penilaian',
            'pegawai' => $pegawai,

        ];
        return view('admin.penilaiantambah', $data);
    }

    public function penilaiantambahsimpan(Request $request)
    {
        $data = [
            'idpegawai' => $request->input('idpegawai'),
            'kompetensi_teknis' => $request->input('kompetensi_teknis'),
            'kompetensi_soft_skill' => $request->input('kompetensi_soft_skill'),
            'kehadiran' => $request->input('kehadiran'),
            'produktivitas' => $request->input('produktivitas'),
            'inisiatif_kreativitas' => $request->input('inisiatif_kreativitas'),
        ];

        DB::table('penilaian_kinerja')->insert($data);

        session()->flash('success', 'Penilaian kinerja berhasil ditambahkan!');
        return redirect('admin/penilaiandaftar');
    }

    public function penilaianedit($id)
    {
        $penilaian = DB::table('penilaian_kinerja')->where('id', $id)->first();
        $pegawai = DB::table('pegawai')->get();

        if (!$penilaian) {
            return redirect('admin/penilaiandaftar')->with('error', 'Data penilaian tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Penilaian Kinerja Pegawai',
            'pegawai' => $pegawai,
            'penilaian' => $penilaian,
        ];

        return view('admin.penilaianedit', $data);
    }

    public function penilaianeditSimpan(Request $request, $id)
    {
        $data = [
            'idpegawai' => $request->input('idpegawai'),
            'kompetensi_teknis' => $request->input('kompetensi_teknis'),
            'kompetensi_soft_skill' => $request->input('kompetensi_soft_skill'),
            'kehadiran' => $request->input('kehadiran'),
            'produktivitas' => $request->input('produktivitas'),
            'inisiatif_kreativitas' => $request->input('inisiatif_kreativitas'),
        ];

        DB::table('penilaian_kinerja')->where('id', $id)->update($data);

        session()->flash('success', 'Penilaian kinerja berhasil diperbarui!');
        return redirect('admin/penilaiandaftar');
    }

    public function penilaianhapus($id)
    {
        DB::table('penilaian_kinerja')->where('id', $id)->delete();

        session()->flash('success', 'Penilaian kinerja berhasil dihapus!');
        return redirect('admin/penilaiandaftar');
    }

    public function prediksi(Request $request)
    {
        $data = DB::table('penilaian_kinerja')->get();
        // Prepare features and targets
        $features = [];
        $targets = [];
        foreach ($data as $row) {
            $features[] = [
                $row->kompetensi_teknis,
                $row->kompetensi_soft_skill,
                $row->kehadiran,
                $row->produktivitas,
                $row->inisiatif_kreativitas,
            ];
            $targets[] = $row->tingkat_mutu_karyawan; // Existing target
        }

        // Split the data into training and testing sets (80% training, 20% testing)
        $splitRatio = 0.8;
        $splitIndex = (int) (count($features) * $splitRatio);

        $trainFeatures = array_slice($features, 0, $splitIndex);
        $trainTargets = array_slice($targets, 0, $splitIndex);
        $testFeatures = array_slice($features, $splitIndex);
        $testTargets = array_slice($targets, $splitIndex);

        // Create and train Random Forest
        $rf = new RandomForest(10); // Instantiate with 10 trees
        $rf->train($trainFeatures, $trainTargets);

        // Make predictions on the test set
        $predictions = [];
        foreach ($testFeatures as $feature) {
            $predictions[] = $rf->predict($feature);
        }

        // Evaluate model performance
        $accuracy = $this->calculateAccuracy($predictions, $testTargets);

        // Pass predictions and accuracy to the view
        return view('admin.prediksi', [
            'predictions' => $predictions,
            'data' => $data,
            'accuracy' => $accuracy,
        ]);
    }

    private function calculateAccuracy($predictions, $actual)
    {
        $correct = 0;
        foreach ($predictions as $index => $prediction) {
            if ($prediction === $actual[$index]) {
                $correct++;
            }
        }
        return $correct / count($actual) * 100; // Return accuracy as a percentage
    }
}
