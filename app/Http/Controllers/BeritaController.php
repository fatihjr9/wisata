<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::latest()->get();
        return view('admin.views.berita', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.action.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048', // Validasi untuk setiap gambar
            'deskripsi' => 'required',
            'kategori_id' => 'required', // Pastikan ada kategori yang dipilih
        ]);

        // Upload gambar jika ada
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $namaFile = pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME); // Dapatkan nama file tanpa ekstensi
                $ekstensi = $gambar->getClientOriginalExtension(); // Dapatkan ekstensi file
                $namaFileBaru = $namaFile . '_' . time() . '.' . $ekstensi; // Generate nama baru dengan timestamp untuk mencegah nama yang sama
                $gambarPath = $gambar->storeAs('gambar', $namaFileBaru, 'public'); // Simpan file dengan nama baru
                $gambarPaths[] = $namaFileBaru; // Simpan nama file baru ke dalam array
            }
        }

        // Buat berita baru dan simpan ke database
        $berita = new Berita;
        $berita->nama = $validatedData['nama'];
        $berita->deskripsi = $validatedData['deskripsi'];
        $berita->kategori_id = $validatedData['kategori_id'];
        $berita->gambar = implode(',', $gambarPaths);
        $berita->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id); // Temukan berita berdasarkan ID

        // Hapus gambar dari penyimpanan jika ada
        if ($berita->gambar) {
            $gambarPaths = explode(',', $berita->gambar);
            foreach ($gambarPaths as $gambarPath) {
                Storage::disk('public')->delete('gambar/' . $gambarPath);
            }
        }

        // Hapus berita dari database
        $berita->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function update($id) {
        
    }
}
