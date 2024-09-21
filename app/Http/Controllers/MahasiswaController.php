<?php

namespace App\Http\Controllers;

use App\Http\Services\MahasiswaService;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    private MahasiswaService $mahasiswaService;
    public function formAddMahasiswa($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('components.tambah-mahasiswa', compact('kelas'));
    }

    public function dashboard()
    {
        $user = Auth::user();

        if ($user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
        } else {
            $mahasiswa = null;
        }

        return view('mahasiswa.dashboard-mahasiswa', compact('mahasiswa'));
    }


    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request = Requests::where('mahasiswa_id', $mahasiswa->id)->first();

        return view('mahasiswa.detail-data-mahasiswa', compact('mahasiswa', 'request'));
    }


    public function __construct(MahasiswaService $mahasiswaService)
    {
        $this->mahasiswaService = $mahasiswaService;
    }

    public function addMahasiswa(Request $request)
    {
        Log::info('Log test - Apakah log berfungsi?');

        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'nim' => 'nullable|string|max:20',
            'userId' => 'required|integer|exists:users,id',
            'kelas_id' => 'required|integer|exists:kelas,id',
            'edit' => 'nullable|boolean',
        ]);

        $name = $request->input("nama_mahasiswa");
        $nim = $request->input("nim") ?? null;
        $tempat_lahir = $request->input("tempat_lahir") ?? null;
        $tanggal_lahir = $request->input("tanggal_lahir") ?? null;
        $userId = $request->input("userId");
        $kelasId = $request->input("kelas_id");
        $edit = $request->input("edit") ?? 0;
        
        try {
            $this->mahasiswaService->saveMahasiswa(
                $userId,
                $kelasId,
                $nim,
                $name,
                $tempat_lahir,
                $tanggal_lahir,
                $edit
            );

            Log::info('Mahasiswa berhasil ditambahkan.');

            session()->flash('success', 'Mahasiswa berhasil ditambahkan!');
            
        } catch (\Exception $e) {

            Log::error('Terjadi kesalahan saat menambahkan mahasiswa: ' . $e->getMessage());

            session()->flash('error', 'Terjadi kesalahan saat menambahkan mahasiswa: ' . $e->getMessage());
        }

        return redirect()->route('data-kelas.index'); 
    }

    public function edit($id)
    {
        $mahasiswa = $this->mahasiswaService->getMahasiswaById($id);

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.edit')->with('error', 'Class not found.');
        }

        return view('components.edit-data-anggotaKelas', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'nim' => 'nullable|string|max:20',
        ]);

        $updated = $this->mahasiswaService->updateMahasiswa($id, $data);

        $mahasiswa->edit = 0;
        $mahasiswa->save();

        if ($updated) {
            return redirect()->route('mahasiswa.update', $mahasiswa->id)->with('success', 'Data berhasil di update');
        }

        return redirect()->route('mahasiswa.update', $mahasiswa->id)->with('error', 'Class not found.');
    }

    public function requestEdit(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'keterangan' => 'required|string|max:255',
        ]);

        Requests::create([
            'mahasiswa_id' => $mahasiswa->id,
            'kelas_id' => $mahasiswa->kelas_id,
            'keterangan' => $request->input('keterangan'),
        ]);

        session()->flash('success', 'Permintaan perubahan data telah diajukan.');

        return redirect()->back();
    }
}
