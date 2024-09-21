<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-800">Tambah Kelas</h3>
            <button id="closeModal" class="text-gray-600 hover:text-gray-800">&times;</button>
        </div>
        <form action="/tambah-kelas" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_mahasiswa" class="block text-sm font-medium text-gray-700">Jumlah Mahasiswa</label>
                <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="mt-1 p-2 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeModalBtn" class="bg-gray-500 hover:bg-gray-400 text-white text-gray-800 font-semibold py-2 px-4 rounded-lg mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
