@extends('layouts.client')
@section('content')
{{-- Space --}}
@php
    $gambarArray = explode(',', $berita['gambar']);
@endphp
<div id="default-carousel" class="absolute inset-0 w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden" style="height: 27.5rem!important;">
        @foreach ($gambarArray as $gambarId => $gambarNama)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('/storage/berita/' . $gambarNama) }}" class="w-full bg-center object-cover" alt="">
            </div>
        @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-56 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($gambarArray as $gambarId => $gambarNama)
            <button type="button" class="w-3 h-3 rounded-full {{ $gambarId == 0 ? 'bg-blue-500' : 'bg-gray-300' }}" aria-current="{{ $gambarId == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $gambarId + 1 }}" data-carousel-slide-to="{{ $gambarId }}"></button>
        @endforeach
    </div>
</div>
{{-- Space --}}
<div class="mt-[25rem] w-11/12 md:w-8/12 mx-auto flex flex-col space-y-2 z-50 relative">    
    <div class="flex flex-row items-center gap-x-2 text-sm">
        <a href="{{ route('client.index') }}" class="text-slate-600 cursor-pointer">Beranda</a><p>/</p><h5>{{ $berita->nama }}</h5>
    </div>
    <div class="flex flex-col">
        <h5 class="text-3xl font-bold mb-1">{{ $berita->nama }}</h5>
    </div>
    <p class="text-slate-600 text-justify leading-loose">{!! preg_replace('/\n/', '<br>', e($berita->deskripsi), 1) !!}</p>
</div>

{{-- LAINNYA --}}
<div class="w-11/12 md:w-8/12 mx-auto flex flex-col space-y-4 mt-20 mb-10 z-50 relative">
    <h5 class="text-xl font-semibold">Rekomendasi Berita lainnya</h5>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 mt-20">
        @foreach ($allBerita as $item)
            <div class="bg-white w-full border border-slate-200 rounded-xl flex flex-col justify-between">
                <div class="flex flex-col">
                    @if ($item->gambar)
                        @php
                            $gambarArray = explode(',', $item->gambar);
                            $gambar = array_slice($gambarArray, 0, 1);
                        @endphp
                        @foreach ($gambar as $items)
                            <img src="{{ asset('gambar/' . $items) }}" alt="{{ $item->nama }}" class=" rounded-t-xl h-40 bg-center object-cover">
                        @endforeach
                    @else
                        <img class="w-full h-40 rounded-t-xl bg-center object-cover" src="{{ asset('/header-bg.svg') }}" alt="">
                    @endif
                    <p class="text-sm font-medium rounded-tl-xl rounded-br-xl bg-rose-50 text-rose-600 w-fit absolute px-4 py-1">{{ $item->lokasi }}</p>
                </div>
                <div class="p-2 w-full space-y-2 flex flex-col justify-between">
                    <div class="flex flex-col space-y-0.5">
                        <h5 class="text-lg font-semibold">{{ $item->nama }}</h5>
                        <p class="text-sm text-slate-600 truncate">{{ $item->deskripsi }}</p>
                    </div>
                    <a href="{{ route('client.detail', $item->nama) }}" class="block border border-slate-200 rounded-full py-1.5 text-center w-full">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection