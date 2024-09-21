@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="container mx-auto min-h-full">
        <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="border-b pb-3 flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Tambah Mahasiswa</h3>
            <a href="{{ route('data-kelas.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-1 px-2.5 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

            <form action="/tambah-mahasiswa" method="POST">
                @csrf
                <livewire:user-search-mahasiswa />

                <input type="hidden" name="nim" id="nim" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" >

                <livewire:kelas-form-mahasiswa :kelasId="$kelas->id"/>

                <input type="hidden" name="tempat_lahir" id="tempat_lahir" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" >

                <input type="hidden" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" >

                <input type="hidden" name="edit" id="edit" value="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" >

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
