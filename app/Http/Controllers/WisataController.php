<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index() {
        $data = Wisata::all();
        return view('admin.views.wisata', compact('data'));
    }
    public function create() {
        return view('admin.action.wisata.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'gambar.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
            'nama' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $files = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path('gambar/'), $name);
                $files[] = $name; // Menambahkan nama file gambar ke dalam array
            }
        }
    
        // Menyimpan semua nama file gambar dalam atribut 'gambar'
        $data['gambar'] = implode(',', $files);
        
        Wisata::create($data);
    
        return redirect()->route('admin.wisata.index');
    }
    
    public function edit($id) {
        $wisata = Wisata::findOrFail($id);
        return view('admin.action.wisata.edit', compact('wisata'));
    }
    
    public function update(Request $request, $id) {
        $data = $request->validate([
            'gambar.*' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
            'nama' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $files = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path('gambar/'), $name);
                $files[] = $name;
            }
            // Menghapus gambar-gambar sebelumnya
            $existingFiles = explode(',', $request->input('existing_gambar'));
            foreach ($existingFiles as $existingFile) {
                if (file_exists(public_path('gambar/' . $existingFile))) {
                    unlink(public_path('gambar/' . $existingFile));
                }
            }
        }
    
        // Menyimpan semua nama file gambar dalam atribut 'gambar'
        $data['gambar'] = implode(',', $files);
    
        $wisata = Wisata::findOrFail($id);
        $wisata->update($data);
    
        return redirect()->route('admin.wisata.index');
    }
    
    public function destroy($id) {
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
