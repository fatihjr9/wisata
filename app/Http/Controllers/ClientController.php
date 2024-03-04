<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Wisata;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $wisata = Wisata::latest()->get();
        $berita = Berita::latest()->get();
        return view('client.index', compact('wisata','berita'));
    }

    public function LoadWisata() {
        $data = Wisata::latest()->get();
        return view('client.wisata.index', compact('data'));
    }
    public function LoadBerita() {
        $data = Berita::latest()->get();
        return view('client.berita.index', compact('data'));
    }

    public function detailWisata($id) {
        $data = Wisata::findOrFail($id);
        $allData = Wisata::where('id', '!=', $id)->take(4)->get();
        return view('client.wisata.detail', compact('data','allData'));
    }

    public function detailBerita($id) {
        $berita = Berita::findOrFail($id);
        $allBerita = Berita::where('id', '!=', $id)->take(4)->get();
        return view('client.berita.detail', compact('berita','allBerita'));
    }
    
}
