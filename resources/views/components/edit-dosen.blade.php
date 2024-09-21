@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="bg-white w-full container mx-auto p-6 min-h-full rounded-lg shadow-lg">
        <div class="border-b pb-3 flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Edit Dosen</h3>
            <a href="{{ route('data.data-dosen') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-1 px-2.5 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <livewire:user-search-edit :dosen="$dosen" />

                <div>
                    <label for="kode_dosen" class="block text-sm font-semibold text-gray-700">Kode Dosen</label>
                    <input type="text" name="kode_dosen" id="kode_dosen" value="{{ old('kode_dosen', $dosen->kode_dosen) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan Kode Dosen">
                </div>

                <div>
                    <label for="nip" class="block text-sm font-semibold text-gray-700">NIP</label>
                    <input type="text" name="nip" id="nip" value="{{ old('nip', $dosen->nip) }}" class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan NIP">
                </div>

                <livewire:class-form-edit :dosen="$dosen" />
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg focus:ring-4 focus:ring-blue-200 transition duration-150">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection