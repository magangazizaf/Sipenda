<div>
    <label for="search">Nama Dosen</label>
    <input type="text" name="nama_dosen" id="search" wire:model.live.debounce.250ms="search"
        class="form-control mt-1 mb-1 w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
        placeholder="Ketik nama dosen..." />

    @if(!empty($search) && count($users) > 0)
        <ul class="list-group mt-2">
            @foreach($users as $user)
                <li wire:click="selectUser({{ $user->id }})"
                    class="p-2 bg-gray-200 rounded-lg border-b border-gray-200 hover:bg-gray-100 cursor-pointer">
                    {{ $user->name }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No results found</p>
    @endif

    <!-- Display the selected user -->
    @if($selectedUser)
        <input type="hidden" id="userId" name="userId" wire:model="selectedUser" />
    @endif
</div>
