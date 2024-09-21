<?php

namespace App\Livewire;

use App\Models\Kelas;
use Livewire\Component;

class ClassForm extends Component
{
    public $items = [];
    public $selectedItem = null;

    public function mount()
    {
        $this->items = Kelas::all();
    }

    public function updatedSelectedItem($value)
    {
        $this->selectedItem = $value;
    }
    public function render()
    {
        return view('livewire.class-form');
    }
}
