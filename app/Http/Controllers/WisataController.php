<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {
        $data = Wisata::all();
        return view('admin.views.wisata', compact('data'));
    }
    public function create()
    {
        return view('admin.action.wisata.create');
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'gambar.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
            'nama' => 'required|string',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $gambarPaths = [];

        // Proses file gambar jika ada yang diunggah
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                // Menyimpan file gambar ke direktori yang ditentukan
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('gambar/'), $namaFile);
                $gambarPaths[] = $namaFile; // Menyimpan nama file gambar ke dalam array
            }
        }

        // Menambahkan nama file gambar ke dalam data wisata
        $validatedData['gambar'] = implode(',', $gambarPaths);

        // Membuat entitas Wisata baru dan menyimpannya ke database
        Wisata::create($validatedData);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil disimpan.');
    }


    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('admin.action.wisata.update', compact('wisata'));
    }

    public function updateStore(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'gambar.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
            'nama' => 'required|string',
            'lokasi' => 'required|string',
            'deskripsi' => 'required|string',
            'id' => 'required|exists:wisatas,id', // Pastikan id wisata yang akan diupdate ada di database
        ]);

        // Temukan data wisata berdasarkan ID
        $wisata = Wisata::findOrFail($request->id);

        // Proses file gambar jika ada yang diunggah
        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $file) {
                // Menyimpan file gambar ke direktori yang ditentukan
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('gambar/'), $namaFile);
                $gambarPaths[] = $namaFile; // Menyimpan nama file gambar ke dalam array
            }

            // Hapus gambar lama jika ada
            foreach (explode(',', $wisata->gambar) as $gambarLama) {
                if (file_exists(public_path('gambar/') . $gambarLama)) {
                    unlink(public_path('gambar/') . $gambarLama);
                }
            }

            // Simpan nama file gambar baru ke dalam atribut 'gambar'
            $wisata->gambar = implode(',', $gambarPaths);
        }

        // Update data wisata
        $wisata->nama = $request->nama;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi = $request->deskripsi;

        // Simpan perubahan
        $wisata->save();

        // Redirect ke halaman yang sesuai
        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        // Menghapus gambar-gambar terkait
        $gambar = explode(',', $wisata->gambar);
        foreach ($gambar as $g) {
            if (file_exists(public_path('gambar/' . $g))) {
                unlink(public_path('gambar/' . $g));
            }
        }
        $wisata->delete();

        return redirect()->route('admin.wisata.index');
    }
}
