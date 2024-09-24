<?php

namespace App\Http\Controllers;

use App\Http\Services\KelasService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Carbon\Carbon;

class KelasController extends Controller
{
    private KelasService $kelasService;

    public function index()
    {
        $classList = $this->kelasService->getClass();
        return view('data.data-kelas', compact('classList'));
    }

    public function __construct(KelasService $kelasService)
    {
        $this->kelasService = $kelasService;
    }

    public function addClass(Request $request)
    {
        $namaClass = $request->input("nama_kelas");
        $jumlah = $request->input("jumlah_mahasiswa");

        if (empty($namaClass) || empty($jumlah)) {
            return response()->view("kelas.add", [
                "title" => "Tambah Kelas",
                "error" => "Nama kelas dan jumlah mahasiswa diperlukan"
            ]);
        }

        $this->kelasService->saveClass($namaClass, $jumlah);

        session()->flash('success', 'Kelas berhasil ditambahkan!');

        return redirect()->route('data-kelas.index');
    }


    public function classList(Request $request)
    {
        $classList = $this->kelasService->getClass();
        return response()->view("data.data-kelas", [
            "title" => "Tambah Kelas",
            "classList" => $classList
        ]);
    }

    public function removeClass(Request $request, int $id): RedirectResponse
    {
        $this->kelasService->removeClass($id);
        return redirect()->route('data-kelas.index');
    }

    public function edit($id)
    {
        $kelas = $this->kelasService->getClassById($id);

        if (!$kelas) {
            return redirect()->route('data-kelas.index')->with('error', 'Class not found.');
        }

        return view('components.edit-kelas', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);

        $updated = $this->kelasService->updateClass($id, $data);

        if ($updated) {
            return redirect()->route('data-kelas.index')->with('success', 'Class updated successfully!');
        }

        return redirect()->route('data-kelas.index')->with('error', 'Class not found.');
    }

    public function formAddMahasiswa()
    {
        return view('components.tambah-mahasiswa');
    }

    public function detailKelas($id)
    {
        $kelas = Kelas::with(['mahasiswa', 'waliKelas'])->findOrFail($id);

        foreach ($kelas->mahasiswa as $mahasiswa) {
            if ($mahasiswa->tanggal_lahir) {
                $mahasiswa->formatted_tanggal_lahir = Carbon::parse($mahasiswa->tanggal_lahir)->format('d-m-Y');
            } else {
                $mahasiswa->formatted_tanggal_lahir = 'belum ada';
            }
        }

        return view('kelas.detail-kelas', compact('kelas'));
    }

    public function showKelas() {
        
    }
}
