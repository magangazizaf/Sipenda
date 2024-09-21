<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    public function dashboard_kaprodi()
    {
        $jumlahKelas = Kelas::count();
        $jumlahMahasiswa = Kelas::withCount('mahasiswa')->get()->sum('mahasiswa_count'); 
        $jumlahDosen = Dosen::count(); 

        return view('kaprodi.dashboard', [
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'jumlahDosen' => $jumlahDosen,
            'jumlahKelas' => $jumlahKelas,
        ]);
    }
}
