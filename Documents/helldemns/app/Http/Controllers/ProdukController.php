<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\GambarProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Tampilkan semua produk
    public function index(Request $request)
    {
        $query = Produk::with(['thumbnail']);

        if ($request->has('search')) {
            $query->where('nama_barang', 'LIKE', '%' . $request->search . '%');
        }

        // Tampilkan 6 produk per halaman
        $produks = $query->paginate(6)->withQueryString();

        return view('produk.index', compact('produks'));
    }

    // Form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambars.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('gambar_produk', 'public');
        }

        $produk = Produk::create($data);

        // Simpan gambar tambahan
        $gambarIds = [];
        if ($request->hasFile('gambars')) {
            foreach ($request->file('gambars') as $file) {
                $path = $file->store('produk', 'public');
                $gambar = GambarProduk::create([
                    'produk_id' => $produk->id,
                    'path' => $path
                ]);
                $gambarIds[] = $gambar->id;
            }
        }

        // Simpan thumbnail (jika ada) atau default ke gambar pertama
        if ($request->filled('thumbnail_id')) {
            $produk->update(['thumbnail_id' => $request->thumbnail_id]);
        } elseif (!empty($gambarIds)) {
            $produk->update(['thumbnail_id' => $gambarIds[0]]);
        }

        return redirect()->route('produk.index')->with('success', 'Product successfully added.');
    }

    // Detail produk
    public function show($id)
    {
        $produk = Produk::with(['gambars', 'thumbnail'])->findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    // Form edit produk
    public function edit(Produk $produk)
    {
        $produk->load('gambars', 'thumbnail');
        return view('produk.edit', compact('produk'));
    }

    // Update data produk
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambars.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('gambar_produk', 'public');
        }

        $produk->update($data);

        // Ganti semua gambar jika upload baru
        if ($request->hasFile('gambars')) {
            foreach ($produk->gambars as $gambar) {
                Storage::disk('public')->delete($gambar->path);
                $gambar->delete();
            }

            $gambarIds = [];
            foreach ($request->file('gambars') as $file) {
                $path = $file->store('produk', 'public');
                $gambar = GambarProduk::create([
                    'produk_id' => $produk->id,
                    'path' => $path
                ]);
                $gambarIds[] = $gambar->id;
            }

            if ($request->filled('thumbnail_id')) {
                $produk->update(['thumbnail_id' => $request->thumbnail_id]);
            } elseif (!empty($gambarIds)) {
                $produk->update(['thumbnail_id' => $gambarIds[0]]);
            }

        } elseif ($request->filled('thumbnail_id')) {
            $produk->update(['thumbnail_id' => $request->thumbnail_id]);
        }

        return redirect()->route('produk.index')->with('success', 'Product successfully updated.');
    }

    // Hapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        foreach ($produk->gambars as $gambar) {
            Storage::disk('public')->delete($gambar->path);
            $gambar->delete();
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Product successfully deleted.');
    }
}
