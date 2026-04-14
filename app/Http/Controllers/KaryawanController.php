<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Divisi;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $query = Karyawan::with('divisi');
        
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }
        
        $karyawans = $query->paginate(10);
        
        return view('karyawan.index', compact('karyawans', 'search'));
    }

    public function create()
    {
        $divisis = Divisi::all();
        return view('karyawan.tambah', compact('divisis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        Karyawan::create($validatedData);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $divisis = Divisi::all();
        return view('karyawan.edit', compact('karyawan', 'divisis'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($validatedData);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus!');
    }
}
