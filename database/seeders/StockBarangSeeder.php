<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stockBarangData = [];

        for ($i = 0; $i < 10; $i++) {
            $stockBarangData[] = [
                'user_id' => 1, // Assuming a user_id for seeder
                'kode_barang' => 'BRG-' . uniqid(),
                'nama_barang' => 'Barang ' . $i,
                'stok' => rand(1, 100),
                'tanggal_masuk' => now()->subDays(rand(1, 30))->toDateString(),
                'status' => 'masuk',
                'keterangan_masuk' => 'Keterangan barang ' . $i,
                'foto' => null,
                'harga' => rand(1000, 100000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \App\Models\StockBarang::insert($stockBarangData);
    }
}
