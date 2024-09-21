@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="container mx-auto min-h-full">
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
        @if (session('error'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative mb-6" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652a.5.5 0 10-.707-.707L10 8.586 6.354 4.945a.5.5 0 00-.707.707L9.293 10l-3.646 3.646a.5.5 0 00.707.707L10 11.414l3.646 3.646a.5.5 0 00.707-.707L10.707 10l3.641-3.646z" />
                </svg>
            </span>
        </div>
        @endif
        <div class="relative bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Kelas</h2>
                <a href="javascript:void(0)" id="openModal" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-2.5 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Tambah Kelas
                </a>
            </div>
            <div class="container mx-auto">
                <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b text-center text-sm font-semibold text-gray-700">No</th>
                            <th class="px-6 py-3 border-b text-center text-sm font-semibold text-gray-700">Nama Kelas</th>
                            <th class="px-6 py-3 border-b text-center text-sm font-semibold text-gray-700">Max Mahasiswa</th>
                            <th class="px-6 py-3 border-b text-center text-sm font-semibold text-gray-700">Nama Wali Kelas</th>
                            <th class="px-6 py-3 border-b text-center text-sm font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classList as $list )
                        <tr class="bg-white hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 border-b text-gray-600 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 border-b text-gray-600 text-center">{{$list['name']}}</td>
                            <td class="px-6 py-4 border-b text-gray-600 text-center">{{$list['jumlah']}}</td>
                            <td class="px-6 py-4 border-b text-gray-600 text-center">
                                @if ($list->dosens->isNotEmpty())
                                <ul>
                                    @foreach ($list->dosens as $dosen)
                                    <li>{{ $dosen->name }}</li>
                                    @endforeach
                                </ul>
                                @else
                                Tidak ada wali kelas
                                @endif
                            </td>
                            <td class="px-6 py-4 border-b text-gray-600 flex justify-center">
                                <div x-data="{ isOpen: false }" class="relative inline-block text-left shadow-lg">
                                    <div>
                                        <button type="button" @click="isOpen = !isOpen" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <i class="fas fa-cog" style="font-size: 1rem;"></i>
                                        </button>
                                    </div>
                                    <div x-show="isOpen"
                                        x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95"
                                        class="absolute right-0 z-20 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                        <div class="py-1" role="menu">
                                            <a href="{{ route('kelas.edit', $list['id']) }}" id="openModal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">
                                                <i class="far fa-edit mr-2 text-gray-500" style="font-size: 1.2rem;"></i>Edit
                                            </a>
                                            <form action="/classlist/{{$list['id']}}/delete" method="POST" class="block">
                                                @csrf
                                                <button type="submit" class="w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 flex items-center" role="menuitem" tabindex="-1" id="menu-item-1">
                                                    <i class="far fa-trash-alt mr-2 text-gray-500" style="font-size: 1.2rem;"></i>Hapus
                                                </button>
                                            </form>

                                            <a href="{{ route('detail.kelas', $list['id']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700" role="menuitem" tabindex="-1" id="menu-item-2">
                                                <i class="fas fa-info-circle mr-2 text-gray-500" style="font-size: 1.2rem;"></i>Detail
                                            </a>
                                            <a href="{{ route('tambah.mahasiswa', ['id' => $list['id']]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700" role="menuitem" tabindex="-1" id="menu-item-3">
                                                <i class="fas fa-user-plus mr-2 text-gray-500" style="font-size: 1.2rem;"></i>Tambah Mahasiswa
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('components.tambah-kelas')
@endsection