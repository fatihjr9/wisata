<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center gap-x-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Kategori Berita') }}
            </h2>
            <div class="button">
                <a href="{{ route('admin.berita.create') }}" target="_blank"
                    class="bg-black text-white px-4 py-2 rounded-lg w-fit text-sm">Kembali</a>
                
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-96 mx-auto border border-slate-300">
                <form action="{{ route('admin.kategori.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    <div class="flex flex-col space-y-3">
                        <div class="flex flex-col space-y-1">
                            <p>Nama Kategori</p>
                            <input type="text" name="nama_kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                    </div>
                    <button type="submit" class="mt-4 bg-black text-white rounded-lg w-full py-2">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden sm:rounded-lg border">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kategori as $kategori)
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>
                                        {{ $kategori->nama_kategori }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.kategori.destroy', ['id' => $kategori->id]) }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
