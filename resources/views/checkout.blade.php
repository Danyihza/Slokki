@extends('_layouts.master')

@php
$confirmProduct = session('confirm_product');
// dd($confirmProduct);
@endphp

@section('content')
<main class="mt-8 mb-24">
    <div class="container mx-auto px-6">
        <div class="mt-16">
            <h3 class="text-gray-800 text-5xl font-medium mb-8">Checkout</h3>
            <div class="grid gap-y-1 gap-x-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mt-6">
                @foreach($confirmProduct['data'] as $id => $details)
                <div class="bg-white p-2 rounded-sm justify-between mt-6">
                    <div class="flex flex-between">
                        <img class="h-20 w-20 object-cover rounded"
                            src="{{ asset('assets/images') }}/{{ $details['gambar_produk'] }}">
                        <div class="flex mx-3 flex-col">
                            <div class="">
                                <h3 class="text-sm text-gray-600">{{ $details['nama_produk'] }}</h3>
                                <h3 class="text-sm text-gray-600">{{ $details['netto'] }}</h3>
                            </div>
                            <span class="text-gray-600">Rp
                                {{ number_format($details['harga_produk'] * $details['quantity'], 0, ',', '.') }}
                            </span>
                            <span
                                class="float-right flex text-xs font-bold w-10 h-6 place-content-center items-center bg-brown-300 rounded-md">
                                {{ $details['quantity'] }} pcs
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <h3 class="text-xl text-gray-800 font-medium mt-12">Alamat Pengiriman</h3>
            <form action="{{ route('order.addOrder') }}" method="POST">
                @csrf
                <div class="col-span-3 sm:col-span-3 mb-4 pr-56">
                    <textarea id="alamat" name="alamat" rows="3" readonly
                        class="shadow-sm mt-2 focus:ring-brown-500 focus:border-brown-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder="">{{ $address }}</textarea>
                    <a href="{{ route('changeAddressView') }}"
                        class="flex w-32 items-center justify-center mt-4 px-3 py-2 bg-[#301C11] text-white text-sm font-medium rounded hover:bg-[#301C11] focus:outline-none focus:bg-[#301C11]">
                        Ganti Alamat
                    </a>
                    <div class="flex flex-row justify-between mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Metode Pembayaran</h3>
                        <select id="payment_method" name="payment_method"
                            class="ml-10 block w-3/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                            <option value="ovo">OVO 087743297607</option>
                            <option value="dana">DANA 087743297607</option>
                            <option value="bri">BRI 005101193175518</option>
                            <option value="bca">BCA 8161200032</option>
                            <option value="mandiri">MANDIRI 1560009861549</option>
                        </select>
                    </div>
                    <div class="flex flex-row justify-between mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Total Harga</h3>
                        <input type="text" name="total_amount" id="total_amount"
                            value="Rp {{ number_format($confirmProduct['total'],0,',','.') }}" disabled
                            class="ml-10 focus:ring-brown-500 focus:border-brown-500 block w-3/4 shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="flex flex-row mt-6">
                        <div class="w-1/4"></div>
                        <button type="submit"
                            class="ml-8 flex items-center justify-center mt-4 px-3 py-2 bg-[#301C11] text-white text-sm font-medium rounded hover:bg-[#301C11] focus:outline-none focus:bg-[#301C11]">
                            Pesan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
