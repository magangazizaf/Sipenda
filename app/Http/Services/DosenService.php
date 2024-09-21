<?php 

namespace App\Http\Services;

interface DosenService 
{
    public function saveDosen(string $namaDosen, int $kodeDosen, int $nip, int $kelasId, int $userId);

    public function getDosen();

    public function removeDosen(int $id);

    public function getDosenById(int $id);

    public function updateDosen(int $id, array $data);
}
