@extends('layout')

@section('title', 'Edit Karyawan')

@section('content')
<div class="max-w-2xl mx-auto bg-dark-800 rounded-2xl shadow-xl border border-gray-700/50 overflow-hidden backdrop-blur-md">
    <div class="p-6 border-b border-gray-700 bg-dark-900">
        <h2 class="text-xl font-bold text-white">Edit Data Karyawan</h2>
    </div>
    
    <div class="p-6">
        @if ($errors->any())
            <div class="bg-red-900/30 border border-red-500 text-red-400 px-4 py-3 rounded relative mb-6" role="alert">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="nama" class="block text-sm font-medium text-gray-300 mb-2">Nama Karyawan</label>
                <input type="text" name="nama" id="nama" class="w-full bg-dark-900 text-gray-200 border border-gray-600 focus:border-emerald-500 focus:ring focus:ring-emerald-500/20 rounded-lg py-2.5 px-4 outline-none transition-all" value="{{ old('nama', $karyawan->nama) }}" required>
            </div>

            <div class="mb-5">
                <label for="posisi" class="block text-sm font-medium text-gray-300 mb-2">Posisi</label>
                <input type="text" name="posisi" id="posisi" class="w-full bg-dark-900 text-gray-200 border border-gray-600 focus:border-emerald-500 focus:ring focus:ring-emerald-500/20 rounded-lg py-2.5 px-4 outline-none transition-all" value="{{ old('posisi', $karyawan->posisi) }}" required>
            </div>

            <div class="mb-6">
                <label for="divisi_id" class="block text-sm font-medium text-gray-300 mb-2">Divisi</label>
                <select name="divisi_id" id="divisi_id" class="w-full bg-dark-900 text-gray-200 border border-gray-600 focus:border-emerald-500 focus:ring focus:ring-emerald-500/20 rounded-lg py-2.5 px-4 outline-none transition-all appearance-none" required>
                    <option value="">Pilih Divisi</option>
                    @foreach($divisis as $divisi)
                        <option value="{{ $divisi->id }}" {{ old('divisi_id', $karyawan->divisi_id) == $divisi->id ? 'selected' : '' }}>{{ $divisi->nama_divisi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('karyawan.index') }}" class="px-5 py-2.5 rounded-lg text-gray-300 hover:text-white bg-dark-700 hover:bg-gray-600 transition-colors">Batal</a>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-semibold py-2.5 px-6 rounded-lg shadow-lg shadow-emerald-500/30 transition-all duration-300">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
