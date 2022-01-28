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
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Input Penyuplaian</h3>
            <form action="{{ route('admin.addPenyuplaian') }}" method="POST">
                @csrf
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Tanggal</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="datetime-local" name="tanggal" id="tanggal"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">ID Supplier</h3>
                        <select id="id_supplier" name="id_supplier" class="ml-5 block w-1/2 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                            <option value="" disabled selected>Pilih ID Supplier</option>
                            @foreach($supplier as $s)
                                <option value="{{$s->id_supplier}}">{{$s->id_supplier}} - {{ $s->nama_supplier }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">ID Bahan Baku</h3>
                        <select id="id_bahan_baku" name="id_bahan_baku" class="ml-5 block w-1/2 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                            <option value="" disabled selected>Pilih ID Bahan Baku</option>
                            @foreach($bahan_baku as $bb)
                                <option value="{{$bb->id_bahan_baku}}">{{$bb->id_bahan_baku}} - {{ $bb->nama_bahan_baku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Harga Beli</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan Harga Beli" name="harga_beli" id="harga_beli"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Kuantitas</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan Kuantitas" name="kuantitas" id="kuantitas"
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

        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Input Pengeluaran Lain</h3>
            <form action="{{ route('admin.addPengeluaran') }}" method="POST">
                @csrf
                <div class="col-span-3 sm:col-span-3 mb-4">
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Tanggal</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="datetime-local" name="tanggal" id="tanggal"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Nama Pengeluaran</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan Nama Pengeluaran" name="nama_pengeluaran" id="nama_pengeluaran"
                                class="disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Jenis Pengeluaran</h3>
                        <select id="jenis_pengeluaran" name="jenis_pengeluaran" class="ml-5 block w-1/2 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                        <option value="" disabled selected>Pilih Jenis Pengeluaran</option>
                            <option value="Biaya Overhead">Biaya Overhead</option>
                            <option value="Beban Operasional">Beban Operasional</option>
                    </select>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Harga</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan Harga" name="harga" id="harga"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Satuan</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan Satuan" name="satuan" id="satuan"
                                class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="flex flex-row mt-6">
                        <h3 class="text-xl w-1/4 text-gray-800 font-medium">Jumlah Pengeluaran</h3>
                        <div class="ml-5 flex flex-col w-1/2">
                            <input type="text" placeholder="Harap masukkan Jumlah Pengeluaran" name="jumlah_pengeluaran" id="jumlah_pengeluaran"
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
    </div>
</main>
@endsection

@section('script')
<script>
    async function getBahanBaku(){
        const id_bahan_baku = document.getElementById('id_bahan_baku').value;
        const harga_beli = document.getElementById('harga_beli');
        const response = await fetch(`{{ route('api.getBahanBakuDetail') }}?id=${id_bahan_baku}`)
        .then(response => response.json())
        .then(data => data.data)
        .catch(error => console.log(error));
        harga_beli.value = response.harga_beli;
    }
</script>
@endsection
