<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insert Divisi dummy data
        $divisiIT = \App\Models\Divisi::create(['nama_divisi' => 'IT']);
        $divisiHRD = \App\Models\Divisi::create(['nama_divisi' => 'HRD']);
        $divisiFinance = \App\Models\Divisi::create(['nama_divisi' => 'Finance']);
        $divisiMarketing = \App\Models\Divisi::create(['nama_divisi' => 'Marketing']);
        $divisiProduksi = \App\Models\Divisi::create(['nama_divisi' => 'Produksi']);

        // Insert Karyawan dummy data
        \App\Models\Karyawan::create([
            'divisi_id' => $divisiIT->id,
            'nama' => 'Dedi',
            'posisi' => 'Software Engineer'
        ]);

        \App\Models\Karyawan::create([
            'divisi_id' => $divisiIT->id,
            'nama' => 'Gatot',
            'posisi' => 'System Administrator'
        ]);

        \App\Models\Karyawan::create([
            'divisi_id' => $divisiHRD->id,
            'nama' => 'Ajat',
            'posisi' => 'HR Manager'
        ]);

        \App\Models\Karyawan::create([
            'divisi_id' => $divisiFinance->id,
            'nama' => 'Yudi',
            'posisi' => 'Financial Analyst'
        ]);

        \App\Models\Karyawan::create([
            'divisi_id' => $divisiMarketing->id,
            'nama' => 'Aep',
            'posisi' => 'Social Media Specialist'
        ]);

        \App\Models\Karyawan::create([
            'divisi_id' => $divisiProduksi->id,
            'nama' => 'Wawan',
            'posisi' => 'Quality Control'
        ]);
    }
}
