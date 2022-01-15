@extends('admin._layouts.master')

@section('content')
<main class="mt-8 mb-24">
    <div class="container mx-auto px-6">
        @if (session('error'))
        <div id="alert-success" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
            <span class="text-xl inline-block mr-5 align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </span>
            <span class="inline-block align-middle mr-8">
                <b class="capitalize">Error!</b> Ada kesalahan pada server
            </span>
            <button onclick="document.getElementById('alert-success').style.display='none'"
                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                <span>×</span>
            </button>
        </div>
        @endif
        @if (session('success'))
        <div id="alert-success" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
            <span class="text-xl inline-block mr-5 align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </span>
            <span class="inline-block align-middle mr-8">
                <b class="capitalize">Success!</b> {{session('success')}}
            </span>
            <button onclick="document.getElementById('alert-success').style.display='none'"
                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                <span>×</span>
            </button>
        </div>
        @endif
        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Stok Bahan Baku</h3>
            <form action="{{ route('admin.addStokBahanBaku') }}" method="POST">
                @csrf
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Stok Awal</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan stok awal" name="stok_awal" id="stok_awal"
                                class="disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Stok Akhir</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan stok akhir" name="stok_akhir" id="stok_akhir"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="flex w-fit items-center justify-center px-3 py-2 disabled:bg-gray-400 hover:opacity-90 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Input
                    </button>
                </div>
            </form>
        </div>
        <div id="content-container" class="mt-10 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Stok Barang Dalam Proses</h3>
            <form action="{{ route('admin.addStokBarangProses') }}" method="POST">
                @csrf
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="flex flex-row mt-6">
                        <div class="flex flex-row justify-between w-1/2 mr-3">
                            <h3 class="text-xl text-gray-800 font-medium underline underline-offset-4">Stok Awal</h3>
                        </div>
                        <div class="flex flex-row justify-between w-1/2">
                            <h3 class="text-xl text-gray-800 font-medium underline underline-offset-4">Stok Akhir</h3>
                        </div>
                    </div>

                    <div class="flex flex-row mt-6">
                        <div class="flex flex-row w-1/2 mr-3">
                            <h3 class="text-xl text-gray-800 font-medium w-1/4">Fermentasi</h3>
                            <div class="ml-10 flex flex-col w-1/2">
                                <input type="text" placeholder="Harap masukkan stok awal fermentasi"
                                    name="fermentasi_awal" id="fermentasi_awal"
                                    class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="flex flex-row w-1/2">
                            <h3 class="text-xl text-gray-800 font-medium w-1/4">Fermentasi</h3>
                            <div class="ml-10 flex flex-col w-1/2">
                                <input type="text" placeholder="Harap masukkan stok akhir fermentasi"
                                    name="fermentasi_akhir" id="fermentasi_akhir"
                                    class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row mt-6">
                        <div class="flex flex-row w-1/2 mr-3">
                            <h3 class="text-xl text-gray-800 font-medium w-1/4">Roasting</h3>
                            <div class="ml-10 flex flex-col w-1/2 mr-16">
                                <input type="text" placeholder="Harap masukkan stok awal roasting" name="roasting_awal"
                                    id="roasting_awal"
                                    class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="flex flex-row w-1/2">
                            <h3 class="text-xl text-gray-800 font-medium w-1/4">Roasting</h3>
                            <div class="ml-10 flex flex-col w-1/2">
                                <input type="text" placeholder="Harap masukkan stok akhir roasting"
                                    name="roasting_akhir" id="roasting_akhir"
                                    class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-8 flex justify-center">
                    <button type="submit"
                        class="flex w-fit items-center justify-center px-3 py-2 disabled:bg-gray-400 hover:opacity-90 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Input
                    </button>
                </div>
            </form>
        </div>

        <div id="content-container" class="mt-10 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Stok Produk Jadi</h3>
            <form action="{{ route('admin.addStokProdukJadi') }}" method="POST">
                @csrf
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="flex flex-row mt-6">
                        <div class="flex flex-row justify-between w-1/2 mr-3">
                            <h3 class="text-xl text-gray-800 font-medium underline underline-offset-4">Stok Awal</h3>
                        </div>
                        <div class="flex flex-row justify-between w-1/2">
                            <h3 class="text-xl text-gray-800 font-medium underline underline-offset-4">Stok Akhir</h3>
                        </div>
                    </div>

                    @foreach($produk as $item)

                    <div class="flex flex-row mt-6">
                        <div class="flex flex-row w-1/2 mr-3">
                            <h3 class="text-xl text-gray-800 font-medium">{{$item->id_produk}}</h3>
                            <div class="ml-10 flex flex-col w-1/2">
                                <input type="text" placeholder="Masukkan stok awal {{$item->id_produk}}"
                                    name="awal_{{$item->id_produk}}" id="awal_{{$item->id_produk}}"
                                    class="disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="flex flex-row w-1/2">
                            <h3 class="text-xl text-gray-800 font-medium">{{$item->id_produk}}</h3>
                            <div class="ml-10 flex flex-col w-1/2">
                                <input type="text" placeholder="Masukkan stok akhir {{$item->id_produk}}"
                                    name="akhir_{{$item->id_produk}}" id="akhir_{{$item->id_produk}}"
                                    class="disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="mt-8 flex justify-center">
                    <button type="submit"
                        class="flex w-fit items-center justify-center px-3 py-2 disabled:bg-gray-400 hover:opacity-90 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Input
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
