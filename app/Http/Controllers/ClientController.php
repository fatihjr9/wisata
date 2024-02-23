<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $data = Wisata::latest()->get();
        return view('client.index', compact('data'));
    }

    public function detail($id) {
        $data = Wisata::findOrFail($id);
        $allData = Wisata::where('id', '!=', $id)->take(4)->get();
        return view('client.detail', compact('data','allData'));
    }
    
}
