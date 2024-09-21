<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlahMahasiswa = User::role('mahasiswa')->count();
        $jumlahDosen = User::role('dosen')->count();
        $jumlahKaprodi = User::role('kaprodi')->count();
        $jumlahTotalUser = User::count();

        // Ambil detail user berdasarkan peran
        $mahasiswa = User::role('mahasiswa')->get();
        $dosen = User::role('dosen')->get();
        $kaprodi = User::role('kaprodi')->get();

        return view('superadmin.dashboard-sa', compact('jumlahMahasiswa', 'jumlahDosen', 'jumlahKaprodi', 'jumlahTotalUser', 'mahasiswa', 'dosen', 'kaprodi'));
    }
}
