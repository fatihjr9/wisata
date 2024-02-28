<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.action.kategori.create', compact('kategori'));
    }
    public function create(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            // Tambahkan validasi lain jika diperlukan
        ]);

        // Buat kategori baru dan simpan ke database
        $kategori = new Kategori; // Sesuaikan dengan nama model kategori Anda
        $kategori->nama_kategori = $validatedData['nama_kategori'];
        // Tambahkan atribut lain jika diperlukan

        $kategori->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function destroy($id)
    {
        $berita = Kategori::findOrFail($id); // Temukan berita berdasarkan ID

        // Hapus berita dari database
        $berita->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.kategori.index')->with('success', 'Berita berhasil dihapus.');
    }
}
