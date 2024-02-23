@extends('layouts.client')
@section('content')
<div class="flex flex-col space-y-32">
    <div class="flex flex-col">
        <div class="z-0">
            <img class="w-full absolute inset-0 h-[38rem] rounded-t bg-center object-cover md:rounded-bl-[4rem]" src="{{ asset('/header-bg.svg') }}" alt="">
            <div class="w-full h-[38rem] bg-gradient-to-b from-black/10 to-black absolute inset-0 md:rounded-bl-[4rem]"></div>
            <div class="w-full h-[38rem] bg-gradient-to-l from-black/10 to-black absolute inset-0 md:rounded-bl-[4rem]"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 z-10 mt-80 items-center gap-4">
            <div class="flex flex-col space-y-1">
                <h5 class="text-2xl lg:text-4xl font-bold text-white">Jelajahi tempat terbaik di Indonesia</h5>
                <p class="text-sm text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, porro!</p>
            </div>
            <a href="" class="px-6 py-2 bg-white text-black w-fit md:ml-auto h-fit rounded-full">Explore</a>
        </div>
    </div>
    <div class="py-6 z-10 relative">
        <div class="max-w-7xl mx-auto">
            {{-- Header --}}
            <h5 class="text-2xl lg:text-3xl font-bold">Destinasi Wisata <br> terbaik di Indonesia</h5>
            {{-- Menu --}}
            <div class="my-6 grid grid-cols-2 md:grid-cols-4 gap-2.5">
                @foreach ($data as $item)
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
                            <p class="text-sm font-medium rounded-tl-xl rounded-br-xl bg-rose-50 text-rose-600 w-fit absolute px-4 py-1">{{ $item->lokasi }}</p>
                        </div>
                        <div class="p-2 w-full space-y-3">
                            <div class="flex flex-col space-y-0.5">
                                <h5 class="text-lg font-semibold">{{ $item->nama }}</h5>
                                <p class="text-sm text-slate-600 truncate">{{ $item->deskripsi }}</p>
                            </div>
                            <a href="{{ route('client.detail', $item->id) }}" class="block border border-slate-200 rounded-full py-1.5 text-center w-full">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>            
        </div>
        <div class="max-w-7xl mx-auto">
            {{-- Header --}}
            <h5 class="text-2xl lg:text-3xl font-bold">Kabar terbaru</h5>
            {{-- Menu --}}
            <div class="my-6 grid grid-cols-2 md:grid-cols-4 gap-2.5">
                <div class="bg-white w-full border border-slate-200 rounded-xl">
                    <div class="flex flex-col">
                        <img class="w-full h-44 rounded-t-xl bg-center object-cover" src="{{ asset('/header-bg.svg') }}" alt="">
                        <p class="text-sm font-medium rounded-tl-xl rounded-br-xl bg-indigo-50 text-indigo-600 w-fit absolute px-4 py-1">Terbaru</p>
                    </div>
                    <div class="p-2 w-full space-y-3">
                        <div class="flex flex-col space-y-0.5">
                            <h5 class="text-lg font-semibold">Crackdown</h5>
                        </div>
                        <a href="" class="block bg-indigo-600 text-white rounded-md py-1.5 text-center w-full">Lihat Detail</a>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
