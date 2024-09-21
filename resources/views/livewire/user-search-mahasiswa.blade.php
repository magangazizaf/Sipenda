<div>
    <label for="search">Nama Mahasiswa</label>
    <input type="text" name="nama_mahasiswa" id="search" wire:model.live.debounce.250ms="search" 
        class="form-control mt-1 mb-1 w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
        placeholder="Ketik nama mahasiswa" />

    @if(!empty($search))
        @if($message)
            <p class="mt-2 text-red-600 text-sm mb-2">{{ $message }}</p>
        @else
            <ul class="list-group mt-2">
                @foreach($users as $user)
                    <li wire:click="selectUser({{ $user->id }})"
                        class="p-2 bg-gray-200 rounded-lg border-b border-gray-200 hover:bg-gray-100 cursor-pointer"
                        style="cursor: pointer;">
                        {{ $user->name }}
                    </li>
                @endforeach
            </ul>
        @endif
    @endif

    <input type="text" id="userId" name="userId" wire:model="selectedUser" style="display:none;"/>
</div>
