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
                    <div class="border-4 border-t-blue-400 px-4 py-2 bg-gray-200 ">
                        <h5 class="text-xl/8 font-medium">Dashboard</h5>
                    </div>
                    <div class="px-4 py-6 bg-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-white rounded-lg shadow-xl p-2">
                                <div class="px-4 py-6">
                                    <h5 class="text-md/6 font-medium mb-2">Silahkan cek data kamu</h5>
                                    <a href="{{ route('mahasiswa.detail', $mahasiswa->id) }}" class="inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600
                                    transition duration-300 ease-in-out transform hover:scale-105">
                                        Lihat Data
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('.toast').toast('show')
</script>
@endpush
