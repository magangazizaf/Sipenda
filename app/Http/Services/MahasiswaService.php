<?php 

namespace App\Http\Services;

interface MahasiswaService 
{
    public function saveMahasiswa(int $userId, int $kelasId, ?string $nim, string $name, ?string $tempat_lahir, ?string $tanggal_lahir, string $edit);

    public function getMahasiswa();

    public function removeMahasiswa(int $id);

    public function getMahasiswaById(int $id);

    public function updateMahasiswa(int $id, array $data);
}
