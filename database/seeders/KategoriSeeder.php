<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $kategoris = [
            ['nama_kategori' => 'Politik'],
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Olahraga'],
            // Tambahkan kategori lain sesuai kebutuhan
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
