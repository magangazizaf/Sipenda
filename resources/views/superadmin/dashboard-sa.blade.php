@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-3 pl-3">
    <div class="container mx-auto">
        <div class="flex justify-between mb-3">
            <div>
                <h4 class="text-xl font-semibold">Selamat datang {{ ucwords(auth()->user()->name) }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="p-3">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-4/4">
                <div class="bg-white rounded-lg shadow-md bg">
                    <div class="border-4 border-t-blue-400 px-4 py-2 bg-gray-200">
                        <h5 class="text-xl/8 font-medium">Dashboard</h5>
                    </div>
                    <div class="px-4 py-6 bg-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Jumlah Total Users -->
                            <div class="bg-white rounded-lg shadow-xl p-4">
                                <div class="border-b px-4 py-2">
                                    <h5 class="text-lg font-medium">Jumlah Total User</h5>
                                </div>
                                <div class="px-4 py-6">
                                    <p class="text-2xl font-bold">{{ $jumlahTotalUser }}</p>
                                </div>
                                
                            </div>

                            <!-- Jumlah Mahasiswa -->
                            <div class="bg-white rounded-lg shadow-xl p-4">
                                <div class="border-b px-4 py-2">
                                <h5 class="text-lg font-medium">Jumlah user role Mahasiswa</h5>
                                </div>
                                <div class="px-4 py-6">
                                    <p class="text-2xl font-bold">{{ $jumlahMahasiswa }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <button class="bg-blue-500 text-sm text-white px-3 py-2 rounded-lg ml-4
                                    transition duration-300 ease-in-out transform hover:scale-105" onclick="openModal('mahasiswaModal')">
                                        Detail Mahasiswa
                                    </button>
                                </div>
                            </div>

                            <!-- Jumlah Dosen -->
                            <div class="bg-white rounded-lg shadow-xl p-4">
                                <div class="border-b px-4 py-2">
                                    <h5 class="text-lg font-medium">Jumlah user role Dosen</h5>
                                </div>
                                <div class="px-4 py-6">
                                    <p class="text-2xl font-bold">{{ $jumlahDosen }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <button class="bg-blue-500 text-sm text-white px-3 py-2 rounded-lg ml-4 
                                    transition duration-300 ease-in-out transform hover:scale-105" onclick="openModal('dosenModal')">
                                        Detail Dosen
                                    </button>
                                </div>
                            </div>

                            <!-- Jumlah Kaprodi -->
                            <div class="bg-white rounded-lg shadow-xl p-4">
                                <div class="border-b px-4 py-2">
                                    <h5 class="text-lg font-medium">Jumlah user role Kaprodi</h5>
                                </div>
                                <div class="px-4 py-6">
                                    <p class="text-2xl font-bold">{{ $jumlahKaprodi }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <button class="bg-blue-500 text-sm text-white px-3 py-2 rounded-lg ml-4
                                    transition duration-300 ease-in-out transform hover:scale-105" onclick="openModal('kaprodiModal')">
                                        Detail Kaprodi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mahasiswaModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h3 class="text-lg font-semibold mb-4">Detail Mahasiswa</h3>
        <ul>
            @foreach($mahasiswa as $user)
            <li>{{$loop -> iteration}}. {{ $user->name }}</li>
            @endforeach
        </ul>
        <button class="bg-red-500 text-white px-4 py-2 mt-4 rounded-lg" onclick="closeModal('mahasiswaModal')">Tutup</button>
    </div>
</div>

<div id="dosenModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h3 class="text-lg font-semibold mb-4">Detail Dosen</h3>
        <ul>
            @foreach($dosen as $user)
            <li>{{$loop -> iteration}}. {{ $user->name }}</li>
            @endforeach
        </ul>
        <button class="bg-red-500 text-white px-4 py-2 mt-4 rounded-lg" onclick="closeModal('dosenModal')">Tutup</button>
    </div>
</div>

<div id="kaprodiModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg w-1/3">
        <h3 class="text-lg font-semibold mb-4">Detail Kaprodi</h3>
        <ul>
            @foreach($kaprodi as $user)
            <li>{{$loop -> iteration}}. {{ $user->name }}</li>
            @endforeach
        </ul>
        <button class="bg-red-500 text-white px-4 py-2 mt-4 rounded-lg" onclick="closeModal('kaprodiModal')">Tutup</button>
    </div>
</div>

@endsection

@push('js')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
@endpush