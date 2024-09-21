<?php

namespace App\Http\Services\Impl;

use App\Http\Services\DosenService;
use App\Models\Dosen;

class DosenServiceImpl implements DosenService 
{
    public function saveDosen(string $namaDosen, int $kodeDosen, int $nip, int $kelasId = null, int $userId): void
    {
        $dosen = new Dosen([
            "name" => $namaDosen,
            "kode_dosen" => $kodeDosen,
            "nip" => $nip,
            "kelas_id" => $kelasId,
            "user_id" => $userId
        ]);

        $dosen->save();
    }

    public function getDosen()
    {
        return Dosen::with('kelas')->get();
    }

    public function removeDosen(int $id): void
    {
        $dosen = Dosen::query()->find($id);
        if ($dosen != null) {
            $dosen->delete();
        }
    }

    public function getDosenById(int $id)
    {
        return Dosen::find($id); 
    }

    public function updateDosen(int $id, array $data)
    {
        $dosen = Dosen::find($id);
        if ($dosen) {
            
            $dosen->update($data);
            return true;
        }

        return false;
    }
}