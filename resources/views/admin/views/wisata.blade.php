<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center gap-x-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Wisata') }}
            </h2>
            <a href="{{ route('admin.wisata.create') }}" target="_blank" class="bg-black text-white px-4 py-2 rounded-lg w-fit text-sm">Tambahkan Data</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Lokasi</th>
                            <th class="px-6 py-3">Deskripsi</th>
                            <th class="px-6 py-3">Gambar</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $wisata)
                            <tr class="border-b pb-2 mb-2">
                                <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                <td class="px-6 py-3">{{ $wisata->nama }}</td>
                                <td class="px-6 py-3">{{ $wisata->lokasi }}</td>
                                <td class="px-6 py-3"><p class=" truncate w-20">{{ $wisata->deskripsi }}</p></td>
                                <td class="px-6 py-3">
                                    <div class=" flex flex-row items-center gap-x-2">
                                        @if ($wisata->gambar)
                                            @php
                                                $gambarArray = explode(',', $wisata->gambar);
                                            @endphp
                                            @foreach ($gambarArray as $gambar)
                                                <img src="{{ asset('gambar/' . $gambar) }}" alt="Gambar Wisata" class="w-20">
                                            @endforeach
                                        @else
                                            Tidak Ada Gambar
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-3">
                                    <div class=" flex flex-row items-center gap-x-2">
                                        <a href="{{ route('admin.wisata.update', ['id' => $wisata->id]) }}">Edit</a>
                                        <form action="{{ route('admin.wisata.destroy', $wisata->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
