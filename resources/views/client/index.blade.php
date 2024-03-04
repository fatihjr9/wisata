@extends('layouts.client')
@section('content')
<div class="flex flex-col space-y-32">
    <div class="grid grid-cols-1 md:grid-cols-2 mt-10">
        <div class="flex flex-col space-y-1 justify-between">
            <h5 class="text-2xl lg:text-6xl font-bold">Jelajahi setiap sudut keindahan dunia.</h5>
            <p class="text-base lg:w-96 text-justify">Panggilan untuk menjelajahi keindahan alam yang luar biasa di seluruh dunia. Mari kita berpetualang dan menggali keindahan dunia yang luar biasa ini! 🌍✨</p>
        </div>
        <img class="h-[28rem] ml-auto object-cover bg-center rounded-xl" src="https://images.unsplash.com/photo-1573790387438-4da905039392?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YmFsaXxlbnwwfHwwfHx8MA%3D%3D" alt="">
    </div>
    <div class="py-6 z-10 relative">
        <div class="max-w-7xl mx-auto">
            {{-- Header --}}
            <h5 class="text-2xl lg:text-3xl font-bold">Destinasi Wisata <br> terbaik di Indonesia</h5>
            {{-- Menu --}}
            <div class="my-6 grid grid-cols-2 md:grid-cols-4 gap-2.5">
                @foreach ($wisata as $item)
                    <div class="bg-white w-full border border-slate-200 rounded-xl">
                        <div class="flex flex-col">
                            @if ($item->gambar)
                                @php
                                    $gambarArray = explode(',', $item->gambar);
                                    $gambar = array_slice($gambarArray, 0, 1);
                                @endphp
                                @foreach ($gambar as $items)
                                    <img src="{{ asset('gambar/' . $items) }}" alt="{{ $item->nama }}" class=" rounded-t-xl h-44 bg-center object-cover">
                                @endforeach
                            @else
                                <img class="w-full h-44 rounded-t-xl bg-center object-cover" src="{{ asset('/header-bg.svg') }}" alt="">
                            @endif
                            <p class="text-sm font-medium rounded-xl bg-rose-50 text-rose-600 w-fit absolute px-4 py-1 my-2 mx-1">{{ $item->lokasi }}</p>
                        </div>
                        <div class="p-2 w-full space-y-3">
                            <div class="flex flex-col space-y-0.5">
                                <h5 class="text-lg font-semibold">{{ $item->nama }}</h5>
                                <p class="text-sm text-slate-600 truncate">{{ $item->deskripsi }}</p>
                            </div>
                            <a href="{{ route('client-wisata-detail', $item->id) }}" class="block border border-slate-200 rounded-full py-1.5 text-center w-full">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>            
        </div>
        <div class="max-w-7xl mx-auto">
            {{-- Header --}}
            <h5 class="text-2xl lg:text-3xl font-bold">Cocok untuk kamu yang <br> butuh referensi ketika <br> bepergian.</h5>
            {{-- Menu --}}
            <div class="my-6 grid grid-cols-2 md:grid-cols-4 gap-2.5">
                @foreach ($berita as $item)
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
</div>
@endsection
