@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Permintaan</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($requests->isEmpty())
            <div class="bg-gray-100 text-gray-700 p-4 rounded">
                Tidak ada permintaan baru.
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mahasiswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($requests as $request)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $request->mahasiswa->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $request->keterangan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @if ($request->updated_at->isToday())
                                    <form method="POST" action="{{ route('dosen-wali.requests.accept', $request->id) }}" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-xs font-medium py-1 px-2 rounded-lg">
                                            Terima
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('dosen-wali.requests.reject', $request->id) }}" class="inline-block ml-2">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white text-xs font-medium py-1 px-2 rounded-lg">
                                            Tolak
                                        </button>
                                    </form>
                                @else
                                    <div class="bg-gray-300 text-gray-700 p-4 rounded">
                                        Request telah diproses.
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
