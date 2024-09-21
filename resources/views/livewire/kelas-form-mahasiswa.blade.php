<div class="mb-4">
    <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
    <select wire:model="selectedKelas" name="kelas_id" id="kelas_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        <option value="">-- pilih Kelas --</option>
        @foreach ($kelasList as $kelas)
            <option value="{{ $kelas->id }}" @if ($selectedKelas == $kelas->id) selected @endif>
                {{ $kelas->name }}
            </option>
        @endforeach
    </select>

</div>
