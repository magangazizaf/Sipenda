<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserSearchMahasiswa extends Component
{
    public $search = ''; 
    public $selectedUser = null; 
    public $users; 
    public $message = ''; // Property to hold the message

    public function updatedSearch()
    {
        $this->users = User::whereHas('roles', function ($query) {
                $query->where('name', 'mahasiswa');
            })
            ->where('name', 'like', '%' . $this->search . '%')
            ->get();
        
        $this->message = $this->users->isEmpty() ? 'Mahasiswa belum terdaftar, minta admin untuk mendaftarkan' : '';
    }

    public function selectUser($userId)
    {
        $this->selectedUser = $userId;
        $user = User::find($userId);
        $this->search = $user->name;
        $this->users = []; 
        $this->message = ''; 
    }

    public function render()
    {
        return view('livewire.user-search-mahasiswa');
    }
}
