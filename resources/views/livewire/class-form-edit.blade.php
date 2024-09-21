<div>
    <label for="dropdown">Wali dari Kelas</label>
    <select wire:model="selectedItem" id="dropdown" name="kelas_id" class="form-control">
        <option value="">-- Pilih --</option>
        @foreach($items as $item)
            <option value="{{ $item->id }}" {{ old('kelas', $dosen->kelas_id) == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>

    <!-- <p class="mt-2">ID Kelas Terpilih: {{ $selectedItem }}</p> -->
</div>

