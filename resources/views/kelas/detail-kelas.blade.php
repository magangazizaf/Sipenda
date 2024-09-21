@extends('layouts.app')

@section('content')
<div class="bg-gray-100 p-3">
    <div class="container mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold mb-4">Detail {{ $kelas->name }}</h1>

            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-3">Wali Kelas :</h2>
                <p class="text-gray-700">
                    <i class="fas fa-user mr-2"></i> {{ $kelas->waliKelas->name ?? 'Belum ada wali kelas' }}
                </p>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-4">Anggota Kelas</h2>
                <table class="min-w-full table-auto bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">NIM</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2 text-center">Tempat Lahir</th>
                            <th class="px-4 py-2 text-center">Tanggal Lahir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas->mahasiswa as $index => $mahasiswa)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $mahasiswa->nim ?? 'belum ada'}}</td>
                                <td class="px-4 py-2">{{ $mahasiswa->name ?? 'belum ada' }}</td>
                                <td class="px-4 py-2 text-center">{{ $mahasiswa->tempat_lahir ?? 'belum ada' }}</td>
                                <td class="px-4 py-2 text-center">{{ $mahasiswa->formatted_tanggal_lahir ?? 'belum ada' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center">Tidak ada mahasiswa dalam kelas ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <a href="{{ route('data-kelas.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-2.5 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke daftar kelas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
