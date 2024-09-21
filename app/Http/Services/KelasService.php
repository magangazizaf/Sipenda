<?php 

namespace App\Http\Services;

interface KelasService 
{
    public function saveClass(string $name, int $jumlah);

    public function getClass();

    public function removeClass(int $id);

    public function getClassById(int $id);

    public function updateClass(int $id, array $data);
}
