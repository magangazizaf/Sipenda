<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserSearchEdit extends Component
{
    public $search = '';
    public $users = [];
    public $selectedUser = null;

    public function mount($dosen)
    {
        $this->search = old('nama_dosen', $dosen->name);
        
        $this->selectedUser = old('userId', $dosen->user_id);
    }

    public function updatedSearch()
    {
        $this->users = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })
        ->where('name', 'like', '%' . $this->search . '%')
        ->get();
    }

    public function selectUser($userId)
    {
        $this->selectedUser = $userId;
    }

    public function render()
    {
        return view('livewire.user-search-edit');
    }
}
