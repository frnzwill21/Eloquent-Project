@extends('layout')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-white">Daftar Karyawan</h1>
    <a href="{{ route('karyawan.create') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-lg shadow-lg shadow-emerald-500/30 transition-all duration-300">
        + Tambah Karyawan
    </a>
</div>

<div class="bg-dark-800 rounded-2xl shadow-xl border border-gray-700/50 overflow-hidden backdrop-blur-md mb-8">
    <div class="p-6 border-b border-gray-700 w-full flex justify-end">
        <form action="{{ route('karyawan.index') }}" method="GET" class="flex items-center">
            <div class="relative">
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama karyawan..." class="bg-dark-900 text-gray-200 border border-gray-600 focus:border-emerald-500 rounded-l-lg py-2 px-4 outline-none transition-colors w-64">
            </div>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2 px-4 rounded-r-lg transition-colors border border-emerald-600">
                Cari
            </button>
        </form>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-dark-900 text-gray-400 text-sm uppercase tracking-wider">
                    <th class="p-4 border-b border-gray-700 font-medium">No</th>
                    <th class="p-4 border-b border-gray-700 font-medium">Nama Karyawan</th>
                    <th class="p-4 border-b border-gray-700 font-medium">Posisi</th>
                    <th class="p-4 border-b border-gray-700 font-medium">Divisi</th>
                    <th class="p-4 border-b border-gray-700 font-medium text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700/50 text-gray-300">
                @forelse($karyawans as $key => $karyawan)
                    <tr class="hover:bg-dark-700/30 transition-colors">
                        <td class="p-4">{{ $karyawans->firstItem() + $key }}</td>
                        <td class="p-4 font-semibold text-emerald-400">{{ $karyawan->nama }}</td>
                        <td class="p-4">{{ $karyawan->posisi }}</td>
                        <td class="p-4">
                            <span class="bg-emerald-900/40 text-emerald-300 text-xs font-medium px-2.5 py-1 rounded border border-emerald-700/50">
                                {{ $karyawan->divisi->nama_divisi ?? '-' }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="bg-blue-600 hover:bg-blue-500 text-white text-sm py-1 px-3 rounded shadow transition-colors">Edit</a>
                                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-500 text-white text-sm py-1 px-3 rounded shadow transition-colors">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500">
                            Tidak ada data karyawan ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($karyawans->hasPages())
    <div class="p-4 border-t border-gray-700 bg-dark-900/50">
        {{ $karyawans->links() }}
    </div>
    @endif
</div>
@endsection
