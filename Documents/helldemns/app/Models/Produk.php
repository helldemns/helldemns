<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'harga',
        'stok',
        'deskripsi', 
        'gambar',
        'thumbnail_id' // Tambahkan ini agar bisa diisi massal saat update
    ];

    // Relasi ke banyak gambar
    public function gambars()
    {
        return $this->hasMany(GambarProduk::class);
    }

    // Relasi ke gambar yang dijadikan thumbnail
    public function thumbnail()
    {
        return $this->belongsTo(GambarProduk::class, 'thumbnail_id');
    }
}

