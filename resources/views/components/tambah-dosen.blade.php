<div id="form-tambah-dosen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden max-h-screen overflow-y-auto pt-8">
    <div class="bg-white w-96 mt-8 p-8 rounded-lg shadow-lg mb-2">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Tambah Dosen</h3>
            <button id="closeModal" class="text-gray-600 hover:text-gray-800">&times;</button>
        </div>
        <form action="/tambah-dosen" method="POST">
            @csrf
            <div class="space-y-4">
                <livewire:user-search />
                <div>
                    <label for="kode_dosen" class="block text-sm font-semibold text-gray-700">Kode Dosen</label>
                    <input type="text" name="kode_dosen" id="kode_dosen" class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan Kode Dosen">
                </div>
                <div>
                    <label for="nip" class="block text-sm font-semibold text-gray-700">NIP</label>
                    <input type="text" name="nip" id="nip" class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan NIP">
                </div>
                <livewire:class-form />
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg focus:ring-4 focus:ring-blue-200 transition duration-150">Simpan</button>
            </div>
        </form>
    </div>
</div>