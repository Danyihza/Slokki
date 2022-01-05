@extends('_layouts.master')

@section('content')
<main class="my-8">
    <div class="container mx-auto px-6">
        <div class="flex justify-center">
            <div class="w-full px-56 flex flex-row">
                <input placeholder="Cari Keyword Disini" type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-3/4 shadow-sm sm:text-sm border-gray-300 rounded-md">
                <button class="ml-2 w-20 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#301C11] hover:bg-brown-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-500">
                    Search
                </button>
            </div>
        </div>
        <div class="mt-16">
            <h3 class="text-gray-800 text-5xl font-medium mb-8">Katalog Produk</h3>
            <div class="grid gap-y-6 gap-x-2 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mt-6">
                <div class="mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-56 bg-cover bg-center bg-no-repeat"
                        style="background-image: url('{{ asset('assets/images/1.jpg') }}')">
                        <button
                            class="p-2 rounded-full bg-amber-900 text-white mx-5 -mb-4 hover:bg-amber-800 focus:outline-none focus:bg-amber-800" title="Tambahkan Ke Keranjang">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg>
                        </button>
                    </div>
                    <div class="flex flex-col px-5 py-3 bg-white">
                        <h3 class="text-gray-700 font-bold uppercase">Arabica FW</h3>
                        <span class="text-gray-500 mt-2">100 gram</span>
                        <span class="text-gray-500 mt-2">Rp 25.000</span>
                    </div>
                </div>
                <div class="mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-56 bg-cover bg-center bg-no-repeat"
                        style="background-image: url('{{ asset('assets/images/1.jpg') }}')">
                        <button
                            class="p-2 rounded-full bg-amber-900 text-white mx-5 -mb-4 hover:bg-amber-800 focus:outline-none focus:bg-amber-800" title="Tambahkan Ke Keranjang">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg>
                        </button>
                    </div>
                    <div class="flex flex-col px-5 py-3 bg-white">
                        <h3 class="text-gray-700 font-bold uppercase">Arabica FW</h3>
                        <span class="text-gray-500 mt-2">100 gram</span>
                        <span class="text-gray-500 mt-2">Rp 25.000</span>
                    </div>
                </div>
                <div class="mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-56 bg-cover bg-center bg-no-repeat"
                        style="background-image: url('{{ asset('assets/images/1.jpg') }}')">
                        <button
                            class="p-2 rounded-full bg-amber-900 text-white mx-5 -mb-4 hover:bg-amber-800 focus:outline-none focus:bg-amber-800" title="Tambahkan Ke Keranjang">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg>
                        </button>
                    </div>
                    <div class="flex flex-col px-5 py-3 bg-white">
                        <h3 class="text-gray-700 font-bold uppercase">Arabica FW</h3>
                        <span class="text-gray-500 mt-2">100 gram</span>
                        <span class="text-gray-500 mt-2">Rp 25.000</span>
                    </div>
                </div>
                <div class="mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-56 bg-cover bg-center bg-no-repeat"
                        style="background-image: url('{{ asset('assets/images/1.jpg') }}')">
                        <button
                            class="p-2 rounded-full bg-amber-900 text-white mx-5 -mb-4 hover:bg-amber-800 focus:outline-none focus:bg-amber-800" title="Tambahkan Ke Keranjang">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg>
                        </button>
                    </div>
                    <div class="flex flex-col px-5 py-3 bg-white">
                        <h3 class="text-gray-700 font-bold uppercase">Arabica FW</h3>
                        <span class="text-gray-500 mt-2">100 gram</span>
                        <span class="text-gray-500 mt-2">Rp 25.000</span>
                    </div>
                </div>
                <div class="mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-56 bg-cover bg-center bg-no-repeat"
                        style="background-image: url('{{ asset('assets/images/1.jpg') }}')">
                        <button
                            class="p-2 rounded-full bg-amber-900 text-white mx-5 -mb-4 hover:bg-amber-800 focus:outline-none focus:bg-amber-800" title="Tambahkan Ke Keranjang">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg>
                        </button>
                    </div>
                    <div class="flex flex-col px-5 py-3 bg-white">
                        <h3 class="text-gray-700 font-bold uppercase">Arabica FW</h3>
                        <span class="text-gray-500 mt-2">100 gram</span>
                        <span class="text-gray-500 mt-2">Rp 25.000</span>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</main>
@endsection