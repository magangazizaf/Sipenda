@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-lg">
        <h3 class="text-lg font-bold mb-4">Lengkapi Data Mahasiswa</h3>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $mahasiswa->name) }}" class="w-full p-2 border border-gray-300 rounded-lg @error('nim') border-red-500 @enderror" required>
                @error('nim')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-gray-700 font-bold mb-2">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" class="w-full p-2 border border-gray-300 rounded-lg @error('nim') border-red-500 @enderror" required>
                @error('nim')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tempat_lahir" class="block text-gray-700 font-bold mb-2">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" class="w-full p-2 border border-gray-300 rounded-lg @error('tempat_lahir') border-red-500 @enderror" required>
                @error('tempat_lahir')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700 font-bold mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" class="w-full p-2 border border-gray-300 rounded-lg @error('tanggal_lahir') border-red-500 @enderror" required>
                @error('tanggal_lahir')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
