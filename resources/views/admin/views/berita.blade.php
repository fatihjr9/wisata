<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center gap-x-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Berita') }}
            </h2>
            <a href="{{ route('admin.berita.create') }}" target="_blank"
                class="bg-black text-white px-4 py-2 rounded-lg w-fit text-sm">Tambahkan Data</a>
        </div>
    </x-slot>

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
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Berita
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi Berita
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $berita)
                                <tr class="border-b pb-2 mb-2">
                                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3">
                                        <div class="flex flex-row items-center gap-x-2">
                                            @if ($berita->gambar)
                                                <img src="{{ asset('storage/gambar/' . $berita->gambar) }}"
                                                    alt="Gambar Berita" style="max-width: 100px" class="rounded-full">
                                            @else
                                                Tidak Ada Gambar
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-6 py-3">{{ $berita->nama }}</td>
                                    <td class="px-6 py-3">
                                        <p class=" truncate w-20">{{ $berita->deskripsi }}</p>
                                    </td>
                                    <td class="px-6 py-3">{{ $berita->kategori->nama_kategori }}</td>

                                    <td class="px-6 py-3">
                                        <div class=" flex flex-row items-center gap-x-2">
                                            <a href="{{ route('admin.berita.update', $berita->id) }}">Edit</a>
                                            <a href="{{ route('admin.berita.destroy', $berita->id) }}">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
