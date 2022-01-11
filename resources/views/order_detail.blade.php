@extends('_layouts.master')

@section('content')
<main class="mt-8 mb-24">
    <div class="container mx-auto px-6">
        <div class="mt-16">
            <h3 class="text-gray-800 text-5xl font-medium mb-8">Nota Transaksi</h3>
            <div class="grid gap-y-1 gap-x-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mt-6">
                @foreach($transaksi->detailTransaksi as $key => $value)
                <div class="bg-white p-2 rounded-sm justify-between mt-6">
                    <div class="flex flex-between">
                        <img class="h-20 w-20 object-cover rounded"
                            src="{{ asset('assets/images') }}/{{ $value->produk->gambar }}">
                        <div class="flex mx-3 flex-col">
                            <div class="">
                                <h3 class="text-sm text-gray-600">{{ $value->produk->nama_produk }}</h3>
                                <h3 class="text-sm text-gray-600">{{ $value->produk->kuantitas }}</h3>
                            </div>
                            <span class="text-gray-600">Rp
                                {{ number_format($value->price * $value->jumlah, 0, ',', '.') }}
                            </span>
                            <span
                                class="float-right flex text-xs font-bold w-10 h-6 place-content-center items-center bg-brown-300 rounded-md">
                                {{ $value->jumlah }} pcs
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <h3 class="text-xl text-gray-800 font-medium mt-12">Alamat Pengiriman</h3>
            <div class="col-span-3 sm:col-span-3 mb-4 pr-56">
                <textarea id="alamat" name="alamat" rows="3" disabled
                    class="shadow-sm mt-2 focus:ring-brown-500 focus:border-brown-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                    placeholder="">{{ $transaksi->address }}</textarea>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Metode Pembayaran</h3>
                    <select id="payment_method" name="payment_method" disabled
                        class="ml-10 block w-3/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                        @switch($transaksi->payment_method)
                        @case('OVO')
                        <option value="ovo">OVO 087743297607</option>
                        @break
                        @case('DANA')
                        <option value="dana">DANA 087743297607</option>
                        @break
                        @case('BRI')
                        <option value="bri">BRI 005101193175518</option>
                        @break
                        @case('BCA')
                        <option value="bca">BCA 8161200032</option>
                        @break
                        @case('MANDIRI')
                        <option value="mandiri">MANDIRI 1560009861549</option>
                        @break
                        @default
                        <option value="">NOT FOUND</option>
                        @endswitch
                    </select>
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Biaya Kirim</h3>
                    <input type="text" value="Rp 3.000" name="ongkir" id="ongkir" disabled
                        class="ml-10 w-3/4 disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">No Resi</h3>
                    <div class="ml-10 flex flex-col w-3/4">
                        <input type="text" value="JNE : 23138472934" name="resi" id="resi" disabled
                            class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <button type="button"
                                class="flex w-32 items-center justify-center mt-4 px-3 py-2 hover:opacity-90 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                                Lihat Resi
                            </button>
                    </div>
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Total Harga</h3>
                    <input type="text" value="Rp 3.000" name="total_amount" id="total_amount" disabled
                        class="ml-10 w-3/4 disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="w-full bg-gray-200 rounded-sm mt-6">
                    <div class="bg-[#F4E3DB] text-xs font-medium text-[#301C11] text-center p-0.5 leading-none rounded-sm" style="width: 25%"> 25% (Diterima)</div>
                </div>
                <div class="flex flex-row justify-between mt-12">
                    <label class="flex cursor-pointer" for="upload">
                        <form action="{{}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
                            <span
                                class="flex w-fit items-center justify-center mt-4 px-3 py-2 hover:opacity-90 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                                Upload Bukti Pembayaran
                            </span>
                            <input class="hidden" id="upload" name="bukti_pembayaran" accept=".png, .jpg, .jpeg" type="file">
                        </form>
                    </label>
                    <button type="button"
                        class="flex w-fit items-center justify-center mt-4 px-3 py-2 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Pesanan Diterima
                    </button>
                </div>
                {{-- <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Total Harga</h3>
                    <input type="text" name="no_telp" id="no_telp" value="Rp {{ number_format($confirmProduct['total'],0,',','.') }}"
                disabled
                class="ml-10 focus:ring-brown-500 focus:border-brown-500 block w-3/4 shadow-sm sm:text-sm
                border-gray-300 rounded-md">
            </div>
            <div class="flex flex-row mt-6">
                <div class="w-1/4"></div>
                <button
                    class="ml-8 flex items-center justify-center mt-4 px-3 py-2 bg-[#301C11] text-white text-sm font-medium rounded hover:bg-[#301C11] focus:outline-none focus:bg-[#301C11]">
                    Pesan
                </button>
            </div> --}}
        </div>
    </div>
    </div>
</main>

@endsection
