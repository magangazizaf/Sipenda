<?php

namespace App\Http\Controllers;

use App\Http\Services\DosenService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

// CONTROLLER UNTUK MANAGE DOSEN - KAPRODI
class DosenController extends Controller
{
    private DosenService $dosenService;
    public function index()
    {
        $dosenList = $this->dosenService->getDosen();
        $users = User::all();
        return view('data.data-dosen', compact('dosenList', 'users'));
    }

    public function halaman_dosen_walikelas()
    {
        $user = Auth::user();

        if ($user && $user->dosen) {
            $kelasId = $user->dosen->kelas_id;
            $mahasiswas = Mahasiswa::where('kelas_id', $kelasId)->get();

            foreach ($mahasiswas as $mahasiswa) {
                $mahasiswa->formatted_tanggal_lahir = $mahasiswa->tanggal_lahir
                    ? \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d-m-Y')
                    : null;
            }

            $dosens = Dosen::where('kelas_id', $kelasId)->get();

            return view('dosen.dosen-data-anggota-kelas', compact('mahasiswas', 'dosens'));
        }

        return redirect()->back()->with('error', 'User atau dosen tidak ditemukan.');
    }


    public function __construct(DosenService $dosenService)
    {
        $this->dosenService = $dosenService;
    }

    public function addDosen(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'kode_dosen' => 'required|string|max:10',
            'nip' => 'required|string|max:20',
            'userId' => 'required|integer|exists:users,id',
            'kelas' => 'nullable|integer|exists:kelas,id',
        ]);

        $namaDosen = $request->input("nama_dosen");
        $kodeDosen = $request->input("kode_dosen");
        $nip = $request->input("nip");
        $userID = $request->input("userId");
        $kelasId = $request->input("kelas");

        $existingDosen = Dosen::where('user_id', $userID)
            ->where('kelas_id', $kelasId)
            ->first();

        if ($existingDosen) {
            session()->flash('error', 'Dosen sudah ada.');
            return redirect()->back()->withInput();
        }

        $kelas = Kelas::find($kelasId);
        if ($kelas && $kelas->waliKelas) {
            session()->flash('error', $kelas -> name .' sudah memiliki wali.');
            return redirect()->back()->withInput();
        }

        try {
            $this->dosenService->saveDosen($namaDosen, $kodeDosen, $nip, $kelasId, $userID);

            session()->flash('success', 'Dosen berhasil ditambahkan!');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menambahkan dosen: ' . $e->getMessage());
        }

        return redirect()->route('data.data-dosen');
    }


    public function deleteDosen(Request $request, int $id): RedirectResponse
    {
        $this->dosenService->removeDosen($id);
        return redirect()->route('data.data-dosen');
    }

    public function edit($id)
    {
        $dosen = $this->dosenService->getDosenById($id);

        if (!$dosen) {
            return redirect()->route('data.data-dosen')->with('error', 'Class not found.');
        }

        return view('components.edit-dosen', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'kode_dosen' => 'required|string|max:10',
            'nip' => 'required|string|max:20',
            'userId' => 'required|integer|exists:users,id',
            'kelas_id' => 'nullable|integer|exists:kelas,id',
        ]);


        $updated = $this->dosenService->updateDosen($id, $data);

        if ($updated) {
            return redirect()->route('data.data-dosen')->with('success', 'Dosen berhasil di update');
        }
        return redirect()->route('data.data-dosen')->with('error', 'Class not found.');
    }
}
