<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center gap-x-2 justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Wisata') }}
            </h2>
            <a href="{{ route('admin.wisata.create') }}" target="_blank" class="bg-black text-white px-4 py-2 rounded-lg w-fit text-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-96 mx-auto border border-slate-300">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    <div class="flex flex-col space-y-3">
                        <div class="flex flex-col space-y-1">
                            <p>Nama Berita</p>
                            <input type="text" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <p>gambar Berita</p>
                            <input type="file" multiple name="gambar[]" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <p>Kategori</p>
                            <input type="text" name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="flex flex-col space-y-1">
                            <p>deskripsi Berita</p>
                            <textarea name="deskripsi" id="" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 bg-black text-white rounded-lg w-full py-2">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
