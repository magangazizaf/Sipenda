<?php

namespace App\Http\Services\Impl;

use App\Http\Services\KelasService;
use App\Models\Kelas;
use Illuminate\Support\Facades\Session;

class KelasServiceImpl implements KelasService
{
    public function saveClass(string $name, int $jumlah): void
    {
        $class = new Kelas([
            "name" => $name,
            "jumlah" => $jumlah
        ]);

        $class->save();
    }

    public function getClass()
    {
        return Kelas::with('dosens')->get();
    }

    public function removeClass(int $id)
    {
        $class = Kelas::query()->find($id);
        if ($class != null) {
            $class->delete();
        }
    }

    public function getClassById(int $id)
    {
        return Kelas::find($id); // Returns null if not found
    }

    public function updateClass(int $id, array $data)
    {
        $kelas = Kelas::find($id);

        if ($kelas) {
            $kelas->update($data);
            return true;
        }

        return false;
    }
}
