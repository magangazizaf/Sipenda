<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;

class DosenWaliController extends Controller
{
    public function dashboard_wali_dosen()
    {
        $user = Auth::user();
        $kelas = $user->dosen->kelas ?? null;
        $jumlahMahasiswa = $kelas ? $kelas->mahasiswa()->count() : 0; // Menghitung jumlah mahasiswa

        return view('dosen.dashboard-waliKelas', [
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'kelas' => $kelas,
        ]);
    }

    public function showRequests()
    {
        $requests = Requests::all();
        return view('dosen.dosen-wali-request', compact('requests'));
    }

    public function acceptRequest($id, HttpRequest $request)
    {
        $req = Requests::findOrFail($id);
        $mahasiswa = Mahasiswa::findOrFail($req->mahasiswa_id);

        $mahasiswa->edit = 1;
        $mahasiswa->save();

        $req->delete();

        session()->flash('success', 'Request telah diterima dan hak akses edit diberikan.');

        return redirect()->route('dosen-wali.request');
    }

    public function rejectRequest($id, HttpRequest $request)
    {
        $req = Requests::findOrFail($id);

        $req->delete();
        session()->flash('success', 'Request telah ditolak.');

        return redirect()->route('dosen-wali.request');
    }
}
