<?php

namespace App\Http\Services\Impl;

use App\Http\Services\MahasiswaService;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class MahasiswaServiceImpl implements MahasiswaService
{
    public function saveMahasiswa(
        int $userId,
        int $kelasId,
        ?string $nim,
        string $name,
        ?string $tempat_lahir,
        ?string $tanggal_lahir,
        string $edit
    ): void {
        $kelas = Kelas::find($kelasId);
        $existingMahasiswa = Mahasiswa::where('user_id', $userId)
            ->where('kelas_id', $kelasId)
            ->first();

        if ($existingMahasiswa) {
            throw new \Exception('Mahasiswa ' . $existingMahasiswa->name . ' sudah terdaftar dalam kelas ' . $kelas->name . '.');
        }

        $otherClass = Mahasiswa::where('user_id', $userId)
            ->where('kelas_id', '!=', $kelasId) // Cek di kelas lain
            ->first();

        if ($otherClass) {
            $otherKelas = Kelas::find($otherClass->kelas_id);
            $otherKelasName = $otherKelas ? $otherKelas->name : 'Kelas tidak ditemukan';
            throw new \Exception('Mahasiswa ' . $name . ' sudah terdaftar di' . $otherKelasName . '.');
        }

        $currentCount = Mahasiswa::where('kelas_id', $kelasId)->count();
        $kelas = Kelas::find($kelasId);

        if ($kelas && $currentCount >= $kelas->jumlah) {
            throw new \Exception('Jumlah mahasiswa di' . $kelas->name . ' sudah mencapai batas maksimal: ' . $kelas->jumlah . '.');
        }

        // Jika belum ada, lanjutkan untuk menyimpan data mahasiswa baru
        $mahasiswa = new Mahasiswa([
            'user_id' => $userId,
            'kelas_id' => $kelasId,
            'nim' => $nim,
            'name' => $name,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'edit' => $edit,
        ]);

        $mahasiswa->save();
    }



    public function getMahasiswa()
    {
        return Mahasiswa::all();
    }

    public function removeMahasiswa(int $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa) {
            $mahasiswa->delete();
            return true;
        }
        return false;
    }

    public function getMahasiswaById(int $id)
    {
        return Mahasiswa::find($id);
    }

    public function updateMahasiswa(int $id, array $data)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa) {
            $mahasiswa->update($data);
            return $mahasiswa;
        }
        return null;
    }
}
