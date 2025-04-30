<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'nama_barang' => 'Baju Kemeja',
            'harga' => 150000,
            'stok' => 10,
            'deskripsi' => 'Kemeja katun premium.'
        ]);
    }
}
