<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserSearch extends Component
{
    public $search = ''; 
    public $selectedUser = null; 
    public $users = []; 

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

        $user = User::find($userId);
        $this->search = $user->name;

        $this->users = [];
    }

    public function render()
    {
        return view('livewire.user-search');
    }
}
