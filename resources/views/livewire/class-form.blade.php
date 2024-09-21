<div>
    <label for="dropdown">Wali dari Kelas</label>
    <select wire:model.lazy="selectedItem" id="dropdown" name="kelas" class="form-control">
        <option value="">-- Pilih --</option>
        @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>

    <!-- <p class="mt-2">ID Kelas Terpilih: {{ $selectedItem }}</p> -->

</div>
