@extends('layouts.client')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            {{-- Header --}}
            <div class="flex flex-col space-y-6 items-center lg:mt-4">
                <h5 class="text-3xl lg:text-6xl font-black text-center">Cocok untuk kamu yang butuh <br> referensi ketika bepergian.</h5>
                <form class="w-96 mx-auto">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari referensi sebelum bepergian" required />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
            </div>
            {{-- Menu --}}
            <div class="my-10 grid grid-cols-2 md:grid-cols-4 gap-2.5">
                @foreach ($data as $item)
                    <div class="bg-white w-full border border-slate-200 rounded-xl">
                        <div class="flex flex-col">
                            @if ($item->gambar)
                                @php
                                    $gambarArray = explode(',', $item->gambar);
                                    $gambar = array_slice($gambarArray, 0, 1);
                                @endphp
                                @foreach ($gambar as $items)
                                    <img src="{{ asset('storage/berita/' . $items) }}" alt="{{ $item->nama }}" class=" rounded-t-xl h-44 bg-center object-cover">
                                @endforeach
                            @else
                                <img class="w-full h-44 rounded-t-xl bg-center object-cover" src="{{ asset('/header-bg.svg') }}" alt="">
                            @endif
                            <p class="text-sm font-medium rounded-xl bg-indigo-50 text-indigo-600 w-fit absolute px-4 py-1 my-2 mx-1">{{ $item->kategori['nama_kategori'] }}</p>
                        </div>
                        <div class="p-2 w-full space-y-3">
                            <div class="flex flex-col space-y-0.5">
                                <h5 class="text-lg font-semibold">{{ $item->nama }}</h5>
                                <p class="text-sm text-slate-600 truncate">{{ $item->deskripsi }}</p>
                            </div>
                            <a href="{{ route('client-berita-detail', $item->id) }}" class="block border border-slate-200 rounded-full py-1.5 text-center w-full">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>            
        </div>
    </div>
@endsection