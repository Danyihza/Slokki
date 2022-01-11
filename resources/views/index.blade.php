@extends('_layouts.master')

@section('content')
<main class="my-8">
    <div class="container mx-auto px-6">
        {{-- <div class="h-64 rounded-md overflow-hidden bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                <div class="px-10 max-w-xl">
                    <h2 class="text-2xl text-white font-semibold">Sport Shoes</h2>
                    <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                    <button
                        class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <span>Shop Now</span>
                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="md:flex mt-8 md:-mx-4">
            <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
                style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">Back Pack</h2>
                        <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                        <button
                            class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                            <span>Shop Now</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
                style="background-image: url('https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">Games</h2>
                        <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                        <button
                            class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                            <span>Shop Now</span>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="flex justify-center">
            <img src="{{ asset('assets/images/logo/logo.jpg') }}" class="lg:w-1/6 w-3/4" alt="">
        </div>
        <div class="mt-16">
            {{-- <h3 class="text-gray-600 text-2xl font-medium">Fashions</h3> --}}
            <div class="grid gap-y-6 gap-x-2 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mt-6">
                @foreach($produk as $item)
                <div class="mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-56 bg-cover bg-center bg-no-repeat"
                        style="background-image: url('{{ asset('assets/images/' . $item['gambar']) }}')">
                        <a
                            href="{{ route('cart.addToCart') }}?product_id={{ $item['id_produk'] }}&qty=1"
                            class="p-2 rounded-full bg-amber-900 text-white mx-5 -mb-4 hover:bg-amber-800 focus:outline-none focus:bg-amber-800" title="Tambahkan Ke Keranjang">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z"/></svg>
                        </a>
                    </div>
                    <div class="flex flex-col px-5 py-3 bg-white">
                        <h3 class="text-gray-700 font-bold uppercase truncate">{{ $item['nama_produk'] }}</h3>
                        <span class="text-gray-500 mt-2">{{ $item['kuantitas'] }}</span>
                        <span class="text-gray-500 mt-2">Rp {{ number_format($item['harga_jual'], 0, ',', '.') }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</main>
@endsection