@extends('layouts.app')

@section('content')
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Edit Kelas</h3>
            </div>
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                    <input type="text" name="name" id="nama_kelas" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" value="{{ old('nama_kelas', $kelas->name) }}" required>
                </div>
                <div class="mb-4">
                    <label for="jumlah_mahasiswa" class="block text-sm font-medium text-gray-700">Jumlah Mahasiswa</label>
                    <input type="number" name="jumlah" id="jumlah_mahasiswa" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" value="{{ old('jumlah_mahasiswa', $kelas->jumlah) }}" required>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('data-kelas.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg mr-2">Batal</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
