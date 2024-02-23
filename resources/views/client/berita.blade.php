@extends('layouts.client')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            {{-- Header --}}
            <div class="grid grid-cols-2 items-center">
                <h5 class="text-2xl lg:text-3xl font-bold">Kemajuan di sektor <br> pariwisata Indonesia</h5>
                <div class="flex flex-col space-y-0.5 ml-auto">
                    <p class="text-xs font-medium text-slate-400">Filter</p>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-40 p-2">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
            </div>
            {{-- Menu --}}
            <div class="my-6 grid grid-cols-2 md:grid-cols-4 gap-2.5">
                <div class="bg-white w-full border border-slate-200 rounded-md">
                    <img class="w-full h-44 rounded-t bg-center object-cover" src="https://images.unsplash.com/photo-1706569460240-a8270510f96d?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw5fHx8ZW58MHx8fHx8" alt="">
                    <div class="p-2 w-full space-y-3">
                        <div class="flex flex-col space-y-0.5">
                            <h5 class="text-lg font-semibold">Crackdown</h5>
                            <p class="text-xs px-2 py-0.5 bg-indigo-50 text-indigo-600 rounded-sm w-fit">12 Januari 2029 | Indonesia</p>
                            <p class="text-sm text-slate-600 truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        <a href="" class="block bg-indigo-600 text-white rounded-md py-1.5 text-center w-full">Lihat Detail</a>
                    </div>
                </div>
            </div>            
        </div>
    </div>
@endsection
