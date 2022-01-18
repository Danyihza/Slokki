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
        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Harga Pokok Produksi</h3>
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-bold">Pemakaian Bahan Baku</h3>
                    </div>
                    <div class="flex flex-row justify-between mt-6">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Bahan Baku (Awal)</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.157.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Pembelian Bahan Baku</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">584.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pers. Bahan Baku yang Tersedia</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Bahan Baku (Akhir)</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">584.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pemakaian Bahan Baku</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold">Biaya Tenaga Kerja Langsung</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">2.550.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold">Biaya Overhead Pabrik</h3>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Bahan Penolong</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">0</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">BOP-D</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">584.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Jumlah Biaya Overhead Pabrik</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold pl-16">Jumlah Biaya Produksi</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan BDP (Awal)</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">584.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Jumlah Barang Dalam Proses</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan BDP (Akhir)</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">584.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold pl-16">Harga Pokok Produksi</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">1.742.000</h3>
                        </div>
                    </div>
                </div>
        </div>

        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Harga Pokok Penjualan</h3>
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-6">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold">Komponen HPP</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-bold text-right">Besaran</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-6">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Awal</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.157.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Pembelian Bersih</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">584.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Akhir</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">584.500</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-6">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold">Total HPP</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-bold text-right">1.738.000</h3>
                        </div>
                    </div>
                </div>
        </div>
        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Laporan Laba Rugi</h3>
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-bold">Pendapatan (Revenue)</h3>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Penjualan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pendapatan Lain</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Total Pendapatan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">2.550.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold">Harga Pokok Penjualan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">2.550.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Laba/Rugi Kotor</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">2.550.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold">Beban Operasional</h3>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pajak dan Pemeliharaan Bangunan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Transportasi dan Bensin</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Interbet & Pulsa</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Total Biaya</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">2.550.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal">Laba Sebelum Pajak</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">2.550.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pajak Penghasilan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">1.742.000</h3>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mt-3">
                        <h3 class="text-xl w-1/2 text-gray-800 font-bold">Laba Bersih</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">2.550.000</h3>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</main>
@endsection
