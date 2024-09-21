@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="container mx-auto p-4 relative bg-white rounded-lg shadow-lg">
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative mb-6" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652a.5.5 0 10-.707-.707L10 8.586 6.354 4.945a.5.5 0 00-.707.707L9.293 10l-3.646 3.646a.5.5 0 00.707.707L10 11.414l3.646 3.646a.5.5 0 00.707-.707L10.707 10l3.641-3.646z" />
                </svg>
            </span>
        </div>
        @endif
        <h3 class="text-lg font-bold mb-3 pl-1">Data Anggota {{ auth()->user()->dosen->kelas->name ?? 'tidak ada' }} </h3>
        @foreach ($dosens as $dosen)
        <h4 class="text-md font-sm mb-3 pl-1">Wali Kelas : {{$dosen -> name}}</h4>
        @endforeach
        <div class="container mx-auto">
            <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 border-b text-center">No</th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-center">Nama</th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-center">NIM</th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-center">Tempat Lahir</th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-center">Tanggal Lahir</th>
                        <th class="py-2 px-4 bg-gray-200 border-b text-center">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $mahasiswa->name }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $mahasiswa->nim ?? 'belum ada' }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $mahasiswa->tempat_lahir ?? 'belum ada' }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $mahasiswa->formatted_tanggal_lahir ?? 'belum ada' }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            @if (is_null($mahasiswa->nim) || is_null($mahasiswa->tempat_lahir) || is_null($mahasiswa->tanggal_lahir))
                                <a href="{{ route('mahasiswa.edit', $mahasiswa['id']) }}" class="text-xs bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">
                                    Lengkapi Data
                                </a>
                            @else
                                <a href="{{ route('mahasiswa.edit', $mahasiswa['id']) }}" class="text-xs bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">
                                    Edit Data
                                </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-2 px-4 text-center">Belum ada anggota</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
