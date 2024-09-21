<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas; // Asumsi model 'Kelas' digunakan

class ClassFormEdit extends Component
{
    public $selectedItem = null;
    public $items = [];
    public $dosen;

    public function mount($dosen)
    {
        $this->dosen = $dosen;
        $this->selectedItem = $dosen->kelas_id;
        $this->items = Kelas::all();
    }
    public function updatedSelectedItem($value)
    {
        $this->selectedItem = $value; 
    }


    public function render()
    {
        return view('livewire.class-form-edit');
    }
}
