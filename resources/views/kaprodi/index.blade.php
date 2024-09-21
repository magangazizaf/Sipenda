@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="container mx-auto">
            <div class="rounded-xl shadow-lg">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="border-t-4 border-blue-400 px-6 py-4 bg-gray-200 rounded-t-lg">
                        <h5 class="text-2xl font-semibold text-gray-800">Tambah Dosen</h5>
                    </div>
                    <div class="px-6 py-8 bg-gray-50">
                        <form action="#" method="POST">
                            <div class="space-y-6">
                                <!-- Nama Input -->
                                <div>
                                    <label for="username" class="block text-lg font-semibold text-gray-700">Nama</label>
                                    <input type="text" name="username" id="username" class="mt-2 w-full p-2 border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan Nama">
                                </div>
                            
                                <!-- Kode Dosen Input -->
                                <div>
                                    <label for="kode_dosen" class="block text-lg font-semibold text-gray-700">Kode Dosen</label>
                                    <input type="text" name="kode_dosen" id="kode_dosen" class="mt-2 w-full p-2 border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan Kode Dosen">
                                </div>

                                <!-- NIP Input -->
                                <div>
                                    <label for="nip" class="block text-lg font-semibold text-gray-700">NIP</label>
                                    <input type="text" name="nip" id="nip" class="mt-2 w-full p-2 border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan NIP">
                                </div>

                                <div>
                                    <label for="wali-kelas" class="block text-lg font-semibold text-gray-700">Wali Kelas</label>
                                    <input type="text" name="nip" id="nip" class="mt-2 w-full p-2 border-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan NIP">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-8">
                                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-lg focus:ring-4 focus:ring-blue-200 transition duration-150">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
