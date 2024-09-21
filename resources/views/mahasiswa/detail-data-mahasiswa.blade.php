@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6 pb-6 border-b">
            <h2 class="text-2xl font-bold">Detail Mahasiswa</h2>
            <a href="{{ route('dashboard.mahasiswa') }}">
                <i class="fas fa-arrow-alt-circle-left fa-lg"></i>
            </a>
        </div>

        <div class="mb-4">
            <h3 class="text-md font-semibold">Nama:</h3>
            <p>{{ $mahasiswa->name }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-md font-semibold mb-2">NIM:</h3>
            <p>{{ $mahasiswa->nim ?? 'Belum ada' }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-md font-semibold mb-2">Tempat Lahir:</h3>
            <p>{{ $mahasiswa->tempat_lahir ?? 'Belum ada' }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-md font-semibold mb-2">Tanggal Lahir:</h3>
            <p>{{ $mahasiswa->tanggal_lahir ?? 'Belum ada' }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-md font-semibold mb-2">Kelas:</h3>
            <p>{{ $mahasiswa->kelas->name ?? 'Belum ada kelas' }}</p>
        </div>
        <div>
            @php
            $request = \App\Models\Requests::where('mahasiswa_id', $mahasiswa->id)->first();
            @endphp

            @if ($mahasiswa->edit === 1)
            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="bg-green-500 hover:bg-green-700 text-white text-sm font-medium py-2 px-3 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                Edit Data
            </a>
            @else
            <div x-data="{ showModal: false }">
                <button @click="showModal = true" class="bg-red-500 hover:bg-red-800 text-white text-sm font-medium py-2 px-3 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Edit Data
                </button>

                <div x-show="showModal" x-cloak class="fixed inset-0 flex items-center justify-center z-50">
                    <div class="bg-black opacity-50 absolute inset-0"></div>

                    <div class="bg-white p-6 rounded-lg shadow-lg z-10 max-w-md mx-auto">
                        <div class="bg-red-500 text-white text-sm px-3 py-2 rounded mb-4">
                            Tidak ada akses untuk mengedit data.
                        </div>

                        @if (!$request)
                        <form method="POST" action="{{ route('mahasiswa.request.edit', $mahasiswa->id) }}">
                            @csrf
                            <div class="mb-4">
                                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" rows="3" class="shadow-sm mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Jelaskan alasan perubahan data..."></textarea>
                            </div>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-sm font-medium py-1.5 px-2.5 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Minta Request
                            </button>
                        </form>
                        @else
                        <div class="flex bg-yellow-500 text-white p-2 rounded mb-4">
                            <svg class="animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12a8 8 0 0116 0" />
                            </svg>
                            <p class="text-sm">Permintaan sedang diproses</p> 
                        </div>

                        @endif

                        <button @click="showModal = false" class="bg-gray-500 hover:bg-gray-700 text-white text-sm font-medium py-2 px-3 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 mt-4">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection