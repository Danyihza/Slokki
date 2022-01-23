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
            <div class="flex flex-row justify-between">
                <h3 class="text-gray-800 text-3xl mb-8 font-bold">Harga Pokok Produksi</h3>
                <button type="button" class="flex flex-row bg-[#301c11] hover:opacity-80 disabled:bg-gray-400 disabled:cursor-not-allowed w-fit h-fit py-2 px-3 text-gray-50 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span class="ml-1 font-medium">
                        Print
                    </span>
                </button>
            </div>
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan_harga-pokok-produksi" oninput="getLaporanHargaPokokProduksi()"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div id="harga-pokok-produksi">
                        {{-- <section>
                            <div class="flex flex-row mt-6">
                                <h3 class="text-xl w-1/4 text-gray-800 font-bold">Pemakaian Bahan Baku</h3>
                            </div>
                            <div class="flex flex-row justify-between mt-6">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Bahan Baku (Awal)</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">{{ number_format($bahan_baku_awal, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal">Pembelian Bahan Baku</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">{{ number_format($pembelian_bahan_baku, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pers. Bahan Baku yang Tersedia</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">{{ number_format($pers_bahan_baku_tersedia, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Bahan Baku (Akhir)</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">{{ number_format($pers_bahan_baku_akhir, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pemakaian Bahan Baku</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">{{ number_format($pemakaian_bahan_baku, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-bold">Biaya Tenaga Kerja Langsung</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">{{ number_format($biaya_tenaga_kerja_langsung, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-bold">Biaya Overhead Pabrik</h3>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal">Bahan Penolong</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">{{ number_format($bahan_penolong, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal">BOP-D</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">{{ number_format($bop_d, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Jumlah Biaya Overhead Pabrik</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">{{ number_format($jumlah_biaya_overhead, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-bold pl-16">Jumlah Biaya Produksi</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">{{ number_format($jumlah_biaya_produksi, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan BDP (Awal)</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">{{ number_format($persediaan_bdp_awal, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Jumlah Barang Dalam Proses</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">{{ number_format($jumlah_barang_dalam_proses, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan BDP (Akhir)</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">{{ number_format($persediaan_bdp_akhir, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between mt-3">
                                <h3 class="text-xl w-1/2 text-gray-800 font-bold pl-16">Harga Pokok Produksi</h3>
                                <div class="ml-5 flex flex-col w-1/2">
                                    <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">{{ number_format($harga_pokok_produksi, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                        </section> --}}
                    </div>
                    <div id="performance-1" class="flex flex-row justify-end mt-6">
                        
                    </div>
                </div>
        </div>

        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <div class="flex flex-row justify-between">
                <h3 class="text-gray-800 text-3xl mb-8 font-bold">Harga Pokok Penjualan</h3>
                <button type="button" class="flex flex-row bg-[#301c11] hover:opacity-80 disabled:bg-gray-400 disabled:cursor-not-allowed w-fit h-fit py-2 px-3 text-gray-50 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span class="ml-1 font-medium">
                        Print
                    </span>
                </button>
            </div>
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan_harga-pokok-penjualan" oninput="getLaporanHargaPokokPenjualan()"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div id="harga-pokok-penjualan">
                        {{-- <div class="flex flex-row justify-between mt-6">
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
                        </div> --}}
                    </div>
                    <div id="performance-2" class="flex flex-row justify-end mt-6">
                    </div>
                </div>
        </div>
        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <div class="flex flex-row justify-between">
                <h3 class="text-gray-800 text-3xl mb-8 font-bold">Laporan Laba Rugi</h3>
                <button type="button" class="flex flex-row bg-[#301c11] hover:opacity-80 disabled:bg-gray-400 disabled:cursor-not-allowed w-fit h-fit py-2 px-3 text-gray-50 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span class="ml-1 font-medium">
                        Print
                    </span>
                </button>
            </div>
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="month" name="bulan" id="bulan_laba-rugi" oninput="getLaporanLabaRugi()" disabled
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div id="laba-rugi">
                        {{-- <div class="flex flex-row mt-6">
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
                        </div> --}}
                    </div>
                    <div id="performance-3" class="flex flex-row justify-end mt-6">
                    </div>
                </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
    async function getLaporanHargaPokokProduksi() {
        const bulan = document.getElementById('bulan_harga-pokok-produksi').value;
        const content = document.getElementById('harga-pokok-produksi');
        const performancePlace = document.getElementById('performance-1');

        if (bulan == '') {
            content.innerHTML = '';
            performancePlace.innerHTML = '';
            return;
        }

        const startTime = performance.now();

        const response = await fetch(`{{ route('api.laporan.getHargaPokokProduksi') }}?month=${bulan}`)
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error(error));

        if (response.code == 404) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `${response.message}`,
            })
            content.innerHTML = '';
            performancePlace.innerHTML = '';

            return;
        }

        const endTime = performance.now();

        const data = response.data;

        const performanceTime = Math.round((endTime - startTime) / 1000 * 100) / 100;

        let html = `
        <div class="flex flex-row mt-6">
            <h3 class="text-xl w-1/4 text-gray-800 font-bold">Pemakaian Bahan Baku</h3>
        </div>
        <div class="flex flex-row justify-between mt-6">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Bahan Baku (Awal)</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.bahan_baku_awal)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Pembelian Bahan Baku</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">${numberWithDots(data.pembelian_bahan_baku)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pers. Bahan Baku yang Tersedia</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.pers_bahan_baku_tersedia)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Bahan Baku (Akhir)</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">${numberWithDots(data.pers_bahan_baku_akhir)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pemakaian Bahan Baku</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">${numberWithDots(data.pemakaian_bahan_baku)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold">Biaya Tenaga Kerja Langsung</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">${numberWithDots(data.biaya_tenaga_kerja_langsung)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold">Biaya Overhead Pabrik</h3>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Bahan Penolong</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.bahan_penolong)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">BOP-D</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right underline underline-offset-8">${numberWithDots(data.bop_d)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Jumlah Biaya Overhead Pabrik</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">${numberWithDots(data.jumlah_biaya_overhead)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold pl-16">Jumlah Biaya Produksi</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">${numberWithDots(data.jumlah_biaya_produksi)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan BDP (Awal)</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">${numberWithDots(data.persediaan_bdp_awal)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Jumlah Barang Dalam Proses</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">${numberWithDots(data.jumlah_barang_dalam_proses)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan BDP (Akhir)</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right underline underline-offset-8">${numberWithDots(data.persediaan_bdp_akhir)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold pl-16">Harga Pokok Produksi</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">${numberWithDots(data.harga_pokok_produksi)}</h3>
            </div>
        </div>
        `;
        content.innerHTML = html;

        performancePlace.innerHTML = `<span class="italic text-xs text-gray-400 opacity-70">Data diambil dalam ${performanceTime} detik</span>`;
        return;
    }

    async function getLaporanHargaPokokPenjualan() {
        const bulan = document.getElementById('bulan_harga-pokok-penjualan').value;
        const content = document.getElementById('harga-pokok-penjualan');
        const performancePlace = document.getElementById('performance-2');
        
        if (bulan == '') {
            content.innerHTML = '';
            performancePlace.innerHTML = '';
            return;
        }

        const startTime = performance.now();

        const response = await fetch(`{{ route('api.laporan.getHargaPokokPenjualan') }}?month=${bulan}`)
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error(error));

        if (response.code == 404) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `${response.message}`,
            })
            content.innerHTML = '';
            performancePlace.innerHTML = '';

            return;
        }

        const endTime = performance.now();

        const data = response.data;

        const performanceTime = Math.round((endTime - startTime) / 1000 * 100) / 100;

        let html = `
        <div class="flex flex-row justify-between mt-6">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold">Komponen HPP</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-bold text-right">Besaran</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-6">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Awal</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.persediaan_awal)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Pembelian Bersih</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.pembelian_bersih)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Persediaan Akhir</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.persediaan_akhir)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-6">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold">Total HPP</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-bold text-right">${numberWithDots(data.total_hpp)}</h3>
            </div>
        </div>
        <input type="hidden" id="total_hpp" value="${data.total_hpp}">
        `;
        content.innerHTML = html;
        document.getElementById('bulan_laba-rugi').removeAttribute('disabled');
        performancePlace.innerHTML = `<span class="italic text-xs text-gray-400 opacity-70">Data diambil dalam ${performanceTime} detik</span>`;
        return;
    }

    async function getLaporanLabaRugi() {
        const hpp = document.getElementById('total_hpp').value;
        const bulan = document.getElementById('bulan_laba-rugi').value;
        const content = document.getElementById('laba-rugi');
        const performancePlace = document.getElementById('performance-3');
        
        if (bulan == '') {
            content.innerHTML = '';
            performancePlace.innerHTML = '';
            return;
        }

        const startTime = performance.now();

        const response = await fetch(`{{ route('api.laporan.getLabaRugi') }}?month=${bulan}`)
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error(error));

        if (response.code == 404) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `${response.message}`,
            })
            content.innerHTML = '';
            performancePlace.innerHTML = '';

            return;
        }

        const endTime = performance.now();

        const data = response.data;

        const performanceTime = Math.round((endTime - startTime) / 1000 * 100) / 100;

        const laba_rugi_kotor = data.total_pendapatan - hpp;
        const laba_sebelum_pajak = laba_rugi_kotor - data.total_biaya;
        const pajak_penghasilan = Math.round((0.5 / 100) * laba_sebelum_pajak);
        const laba_bersih = laba_sebelum_pajak - pajak_penghasilan;
        let html = `
        <div class="flex flex-row mt-6">
            <h3 class="text-xl w-1/4 text-gray-800 font-bold">Pendapatan (Revenue)</h3>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Penjualan</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.penjualan)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pendapatan Lain</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(data.pendapatan_lain)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Total Pendapatan</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">${numberWithDots(data.total_pendapatan)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold">Harga Pokok Penjualan</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">${numberWithDots(hpp)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Laba/Rugi Kotor</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">${numberWithDots(laba_rugi_kotor)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold">Beban Operasional</h3>
        </div>`;
        data.beban_operasional.forEach(beban => {
            html += `
            <div class="flex flex-row justify-between mt-3">
                <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">${beban.nama_pengeluaran} @${numberWithDots(beban.harga)} (${beban.satuan})</h3>
                <div class="ml-5 flex flex-col w-1/2">
                    <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">${numberWithDots(beban.harga * beban.jumlah_pengeluaran)}</h3>
                </div>
            </div>
            `;
        });
        html += `
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Total Biaya</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">${numberWithDots(data.total_biaya)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal">Laba Sebelum Pajak</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-normal text-right">${numberWithDots(laba_sebelum_pajak)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-normal pl-16">Pajak Penghasilan</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-1/4 text-gray-800 font-normal text-right">${numberWithDots(pajak_penghasilan)}</h3>
            </div>
        </div>
        <div class="flex flex-row justify-between mt-3">
            <h3 class="text-xl w-1/2 text-gray-800 font-bold">Laba Bersih</h3>
            <div class="ml-5 flex flex-col w-1/2">
                <h3 class="text-xl w-3/4 text-gray-800 font-bold text-right">${numberWithDots(laba_bersih)}</h3>
            </div>
        </div>
        `;
        content.innerHTML = html;

        performancePlace.innerHTML = `<span class="italic text-xs text-gray-400 opacity-70">Data diambil dalam ${performanceTime} detik</span>`;
        return;
    }

    function numberWithDots(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

</script>
@endsection
