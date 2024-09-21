<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class KelasFormMahasiswa extends Component
{
    public $kelasList = [];
    public $selectedKelas = '';

    public function mount($kelasId = null) // Terima kelas_id dari parameter
    {
        $this->kelasList = Kelas::all(); 
        
        if ($kelasId) {
            $this->selectedKelas = $kelasId;
        }
    }
    public function render()
    {
        return view('livewire.kelas-form-mahasiswa');
    }
}
